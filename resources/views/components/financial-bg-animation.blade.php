@props(['class' => ''])

<svg {{ $attributes->merge(['class' => 'absolute inset-0 w-full h-full ' . $class]) }} viewBox="0 0 800 600" fill="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <!-- Gradients -->
        <linearGradient id="coinGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" class="stop-color-pink-300 dark:stop-color-purple-400" style="stop-color: #ffb8d1;"/>
            <stop offset="100%" class="stop-color-pink-500 dark:stop-color-purple-600" style="stop-color: #ff6995;"/>
        </linearGradient>
        
        <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" class="stop-color-blue-400 dark:stop-color-blue-500" style="stop-color: #32B4FF;"/>
            <stop offset="100%" class="stop-color-blue-600 dark:stop-color-purple-700" style="stop-color: #4169E1;"/>
        </linearGradient>
        
        <linearGradient id="moneyGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" class="stop-color-emerald-300 dark:stop-color-emerald-400" style="stop-color: #6EE7B7;"/>
            <stop offset="100%" class="stop-color-emerald-500 dark:stop-color-emerald-600" style="stop-color: #10B981;"/>
        </linearGradient>

        <!-- Glow Filter -->
        <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
            <feMerge>
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
            </feMerge>
        </filter>
    </defs>

    <!-- Floating Coins -->
    <g class="animate-float opacity-20 dark:opacity-10">
        <circle cx="100" cy="100" r="30" fill="url(#coinGradient)" filter="url(#glow)"/>
        <text x="100" y="107" text-anchor="middle" class="fill-white text-xl font-bold">$</text>
    </g>
    
    <g class="animate-float-delayed opacity-20 dark:opacity-10">
        <circle cx="700" cy="150" r="25" fill="url(#coinGradient)" filter="url(#glow)"/>
        <text x="700" y="157" text-anchor="middle" class="fill-white text-lg font-bold">$</text>
    </g>
    
    <g class="animate-float opacity-15 dark:opacity-10">
        <circle cx="650" cy="450" r="35" fill="url(#coinGradient)" filter="url(#glow)"/>
        <text x="650" y="457" text-anchor="middle" class="fill-white text-2xl font-bold">$</text>
    </g>

    <!-- Animated Chart Line -->
    <g class="opacity-20 dark:opacity-15">
        <path 
            d="M 50 500 Q 150 450, 250 480 T 450 400 T 650 350 T 750 300" 
            stroke="url(#chartGradient)" 
            stroke-width="3" 
            fill="none"
            class="animate-pulse-slow"
        />
        <path 
            d="M 50 500 Q 150 450, 250 480 T 450 400 T 650 350 T 750 300 L 750 600 L 50 600 Z" 
            fill="url(#chartGradient)" 
            class="opacity-30 dark:opacity-20"
        />
    </g>

    <!-- Second Chart Line -->
    <g class="opacity-15 dark:opacity-10">
        <path 
            d="M 50 450 Q 200 500, 300 420 T 500 380 T 700 320" 
            stroke="url(#moneyGradient)" 
            stroke-width="2" 
            fill="none"
            class="animate-pulse-slow"
            style="animation-delay: 1s;"
        />
    </g>

    <!-- Floating Dollar Bills -->
    <g class="animate-float-delayed opacity-15 dark:opacity-10">
        <rect x="200" cy="300" width="50" height="30" rx="3" fill="url(#moneyGradient)" transform="rotate(-15 200 300)" filter="url(#glow)"/>
        <text x="225" y="320" text-anchor="middle" class="fill-white text-sm font-bold">$</text>
    </g>
    
    <g class="animate-float opacity-15 dark:opacity-10">
        <rect x="550" y="200" width="45" height="28" rx="3" fill="url(#moneyGradient)" transform="rotate(10 550 200)" filter="url(#glow)"/>
        <text x="572" y="218" text-anchor="middle" class="fill-white text-sm font-bold">$</text>
    </g>

    <!-- Bar Chart Background -->
    <g class="opacity-10 dark:opacity-8">
        <rect x="150" y="400" width="20" height="150" rx="3" fill="url(#chartGradient)"/>
        <rect x="180" y="350" width="20" height="200" rx="3" fill="url(#chartGradient)"/>
        <rect x="210" y="380" width="20" height="170" rx="3" fill="url(#chartGradient)"/>
        <rect x="240" y="320" width="20" height="230" rx="3" fill="url(#chartGradient)"/>
        <rect x="270" y="360" width="20" height="190" rx="3" fill="url(#chartGradient)"/>
    </g>

    <!-- Percentage Circles -->
    <g class="animate-float opacity-15 dark:opacity-10">
        <circle cx="400" cy="150" r="20" fill="none" stroke="url(#coinGradient)" stroke-width="2" filter="url(#glow)"/>
        <text x="400" y="155" text-anchor="middle" class="fill-pink-500 dark:fill-purple-400 text-xs font-bold">+25%</text>
    </g>
    
    <g class="animate-float-delayed opacity-15 dark:opacity-10">
        <circle cx="300" cy="500" r="18" fill="none" stroke="url(#moneyGradient)" stroke-width="2" filter="url(#glow)"/>
        <text x="300" y="505" text-anchor="middle" class="fill-emerald-500 dark:fill-emerald-400 text-xs font-bold">+12%</text>
    </g>

    <!-- Arrow Indicators -->
    <g class="animate-float opacity-20 dark:opacity-12">
        <path d="M 500 100 L 510 90 L 520 100 L 515 110 L 505 110 Z" fill="url(#moneyGradient)" filter="url(#glow)"/>
    </g>
    
    <g class="animate-float-delayed opacity-20 dark:opacity-12">
        <path d="M 600 500 L 610 510 L 620 500 L 615 490 L 605 490 Z" fill="url(#coinGradient)" filter="url(#glow)"/>
    </g>

    <!-- Decorative Dots -->
    <g class="opacity-20 dark:opacity-10">
        <circle cx="50" cy="50" r="3" class="fill-pink-400 dark:fill-purple-500"/>
        <circle cx="750" cy="550" r="3" class="fill-blue-400 dark:fill-blue-500"/>
        <circle cx="750" cy="50" r="3" class="fill-lightBlue-400 dark:fill-lightBlue-500"/>
        <circle cx="50" cy="550" r="3" class="fill-pink-400 dark:fill-purple-500"/>
    </g>
</svg>
