<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    // Apakah request ini diizinkan
    public function authorize(): bool
    {
        return true; // Semua user boleh mengakses login
    }

    // Validasi input login
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],     // Email wajib
            'password' => ['required', 'string'],           // Password wajib
        ];
    }

    // Fungsi utama autentikasi
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited(); // Pastikan belum melewati batas percobaan login

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Jika gagal login
            RateLimiter::hit($this->throttleKey()); // Tambah hit percobaan

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Tampilkan pesan gagal login
            ]);
        }

        RateLimiter::clear($this->throttleKey()); // Hapus limit saat berhasil login
    }

    // Mengecek apakah login sudah melewati limit (misal 5x)
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this)); // Trigger event Lockout

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    // Menghasilkan "key unik" untuk throttle (gabungan email dan IP user)
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('email')) . '|' . $this->ip()
        );
    }
}
