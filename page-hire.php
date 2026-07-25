<?php
/*
Template Name: Client Hire Wizard
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Elite Talent | Design by Global</title>
    <?php wp_head(); ?>

    <style>
        :root {
            --color-primary: #2fe43b;
            --color-primary-rgb: 47, 228, 59;
            --color-primary-glow: rgba(47, 228, 59, 0.4); 
            --color-bg: #030303;
            --color-box-bg: #141414; 
            --color-neutral: #f4f4f5;
            --color-tertiary: #a1a1aa;
            --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
            
            /* Interactive Mesh Variables */
            --mesh-gap: 2px;
            --triangle-base: 60px;
            --triangle-base-height: calc(1.733 * var(--triangle-base));
            --triangle-width: calc(var(--triangle-base) - var(--mesh-gap));
            --triangle-height: calc(var(--triangle-base-height) - var(--mesh-gap));
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--color-bg);
            color: var(--color-neutral);
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 0;
            overflow-x: hidden;
            overflow-y: auto; 
        }

        ::selection {
            background-color: rgba(var(--color-primary-rgb), 0.3);
            color: var(--color-primary);
        }

        /* ==========================================================================
           GLOBAL INTERACTIVE MESH BACKGROUND
           ========================================================================== */
        .dg-fixed-mesh-bg {
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
            background-color: var(--color-bg);
        }

        .dg-mesh-ambient {
            position: absolute;
            inset: 0;
            background: rgba(47, 228, 59, 0.02); 
            z-index: 1;
        }

        #dg-global-glow {
            position: absolute;
            width: 60vw;
            height: 60vw;
            max-width: 900px;
            max-height: 900px;
            background: radial-gradient(circle closest-side, var(--color-primary-glow) 0%, transparent 100%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            will-change: left, top;
            z-index: 2;
            opacity: 0.8;
            animation: glow-pulse 4s ease-in-out infinite alternate;
        }

        .dg-triangle-container {
            position: absolute;
            inset: 0;
            display: grid;
            grid-template-columns: repeat(var(--columns), calc(var(--triangle-base) * 2 + var(--mesh-gap)));
            width: 100%;
            height: 100%;
            z-index: 3;
            pointer-events: none;
        }

        .dg-triangle-set {
            display: inline-block;
            position: relative;
            width: calc(var(--triangle-base) * 2 + var(--mesh-gap));
            height: var(--triangle-base-height);
        }
        
        .dg-triangle-set--offset {
            transform: translateX(calc(-1 * var(--triangle-base) - 0.5 * var(--mesh-gap)));
        }
        
        .dg-triangle-set::before, 
        .dg-triangle-set::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            top: var(--mesh-gap);
            border-right: var(--triangle-width) solid transparent; 
            border-left: var(--triangle-width) solid transparent;
        }
        
        .dg-triangle-set::before {
            left: calc(-1 * var(--triangle-base));
            border-bottom: var(--triangle-height) solid var(--color-bg);
        }
        
        .dg-triangle-set::after {
            right: calc(var(--mesh-gap) * 2.5);
            border-top: var(--triangle-height) solid var(--color-bg);
        }

        @keyframes glow-pulse {
            0% { transform: translate(-50%, -50%) scale(0.95); opacity: 0.6; }
            100% { transform: translate(-50%, -50%) scale(1.05); opacity: 0.9; }
        }

        /* Header & Progress Bar */
        .wizard-header {
            background-color: rgba(5, 5, 5, 0.35);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header-inner {
            padding: 1.25rem 1rem;
            max-width: 72rem;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-progress-container {
            width: 100%;
            height: 4px;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .top-progress-bar {
            height: 100%;
            background-color: var(--color-primary);
            width: 20%;
            transition: width 0.4s var(--ease-out);
        }

        .brand-logo {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .brand-pulse {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 50%;
            background-color: var(--color-primary);
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .5; }
        }

        .exit-link {
            font-size: 0.875rem;
            color: var(--color-tertiary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }
        
        .exit-link:hover {
            color: var(--color-neutral);
        }

        .wizard-main {
            max-width: 48rem;
            margin: 0 auto;
            padding: 3rem 1rem;
            flex-grow: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
            position: relative;
            z-index: 10;
        }

        /* Form & Steps */
        .wizard-step {
            display: none;
            animation: fadeIn 0.4s var(--ease-out) forwards;
        }
        .wizard-step.is-visible {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .step-headings {
            text-align: center;
            margin-bottom: 2rem;
        }

        .step-title {
            font-size: 1.875rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            margin: 0 0 0.5rem 0;
            
            /* Animated Gradient Core */
            background: linear-gradient(
                to right, 
                var(--color-primary) 0%, 
                #a8ff78 50%, 
                var(--color-primary) 100%
            );
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientTextAnim 4s linear infinite;
        }

        @keyframes gradientTextAnim {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        .step-subtitle {
            color: #fdfdfd;
            font-size: 1rem;
            font-weight: 300;
            margin: 0;
        }

        @media (min-width: 768px) {
            .step-title { font-size: 2.25rem; }
            .step-subtitle { font-size: 1.125rem; }
            .wizard-main { padding: 5rem 1.5rem; }
            .header-inner { padding: 1.25rem 2rem; }
        }

        /* Selection Cards */
        .selection-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .selection-grid-2 { @media (min-width: 640px) { grid-template-columns: repeat(2, 1fr); } }
        .selection-grid-3 { @media (min-width: 640px) { grid-template-columns: repeat(3, 1fr); max-width: 36rem; margin-left: auto; margin-right: auto; } }
        
        .selection-list { max-width: 36rem; margin: 0 auto 2rem auto; display: flex; flex-direction: column; gap: 0.75rem; }

        .selection-card {
            background-color: var(--color-box-bg);
            border: 2px solid rgba(47, 228, 59, 0.15);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: left;
            cursor: pointer;
            transition: all 0.3s var(--ease-out);
            position: relative;
            overflow: hidden;
            color: inherit;
            display: flex;
        }

        .card-vertical { flex-direction: column; }
        .card-horizontal { align-items: center; gap: 1rem; padding: 1.25rem; }
        .card-center { flex-direction: column; align-items: center; justify-content: center; text-align: center; }

        .card-icon {
            font-size: 1.25rem;
            color: var(--color-tertiary);
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
        .card-horizontal .card-icon { margin-bottom: 0; font-size: 1.125rem; }

        .card-label {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--color-neutral);
            margin-bottom: 0.25rem;
            transition: color 0.3s ease;
        }
        .card-horizontal .card-label { margin-bottom: 0; font-size: 1rem; font-weight: 500; }

        .card-desc {
            font-size: 0.875rem;
            color: var(--color-tertiary);
            font-weight: 300;
        }

        .selection-card:hover, 
        .selection-card:focus,
        .selection-card.is-active {
            border-color: var(--color-primary);
            background-color: var(--color-box-bg);
            transform: translateY(-4px);
            outline: none;
            box-shadow: 0 10px 30px -10px rgba(var(--color-primary-rgb), 0.25);
        }

        .selection-card:hover .card-icon, 
        .selection-card:focus .card-icon,
        .selection-card:hover .card-label,
        .selection-card:focus .card-label,
        .selection-card.is-active .card-icon,
        .selection-card.is-active .card-label {
            color: var(--color-primary);
        }

        .selection-card.is-active {
            border-color: var(--color-primary);
            box-shadow: 0 10px 30px -10px rgba(var(--color-primary-rgb), 0.4);
        }

        /* Buttons & Navigation */
        .nav-controls {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            max-width: 36rem;
            margin: 0 auto;
            padding-top: 1rem;
        }

        .nav-controls-right {
            justify-content: flex-end;
            flex-direction: row;
        }

        @media (min-width: 640px) {
            .nav-controls { flex-direction: row; }
        }

        .btn-primary {
            background-color: var(--color-primary);
            color: #000;
            border: none;
            padding: 0.875rem 2.5rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s var(--ease-out);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
        }

        @media (min-width: 640px) {
            .btn-primary { width: auto; }
        }

        .btn-primary:hover:not(:disabled), .btn-primary:focus:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px -10px rgba(var(--color-primary-rgb), 0.4);
            outline: none;
        }

        .btn-primary:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .btn-back {
            background: transparent;
            border: none;
            color: var(--color-tertiary);
            font-weight: 500;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
            width: 100%;
        }

        @media (min-width: 640px) {
            .btn-back { width: auto; }
        }

        .btn-back:hover, .btn-back:focus {
            color: var(--color-neutral);
            outline: none;
        }

        /* Final Form Inputs */
        .form-container {
            max-width: 28rem;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .form-label span {
            font-size: 0.625rem;
            text-transform: lowercase;
            font-weight: 400;
            opacity: 0.7;
        }

        .form-input {
            width: 100%;
            background-color: var(--color-box-bg);
            color: var(--color-neutral);
            border: 1px solid rgba(161, 161, 170, 0.2);
            border-radius: 0.5rem;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input::placeholder {
            color: rgba(161, 161, 170, 0.4);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 2px rgba(var(--color-primary-rgb), 0.2);
            background-color: #1a1a1a;
        }

        .form-disclaimer {
            font-size: 0.6875rem;
            color: #ffffff;
            font-weight: 300;
            text-align: center;
            margin: 1.5rem 0;
            line-height: 1.6;
        }

        /* Seamless Success State */
        .seamless-success {
            display: none;
            text-align: center;
            max-width: 28rem;
            margin: 0 auto;
            animation: fadeIn 0.6s var(--ease-out) forwards;
        }

        .seamless-success.is-active {
            display: block;
        }

        .success-icon-wrap {
            width: 5rem;
            height: 5rem;
            background-color: rgba(var(--color-primary-rgb), 0.1);
            border: 2px solid var(--color-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
            color: var(--color-primary);
            font-size: 2rem;
            animation: successPulse 2s infinite;
        }

        @keyframes successPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(47, 228, 59, 0.4); }
            50% { box-shadow: 0 0 0 15px rgba(47, 228, 59, 0); }
        }

        .success-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 1rem 0;
            color: var(--color-neutral);
            letter-spacing: -0.02em;
        }

        .success-text {
            color: var(--color-tertiary);
            font-size: 1rem;
            line-height: 1.6;
            margin: 0 0 2rem 0;
        }

        .success-text strong {
            color: var(--color-primary);
            font-weight: 700;
        }

        .progress-track {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 9999px;
            height: 0.375rem;
            overflow: hidden;
            margin: 0 auto;
        }

        .progress-fill {
            background-color: var(--color-primary);
            height: 100%;
            border-radius: 9999px;
            animation: progressAnim 4s linear forwards;
        }

        @keyframes progressAnim {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        .progress-label {
            font-size: 0.6875rem;
            color: var(--color-tertiary);
            margin-top: 1rem;
            font-family: monospace;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
    </style>
</head>
<body>

    <!-- Global Fixed Interactive Mesh Background -->
    <div class="dg-fixed-mesh-bg">
        <div class="dg-mesh-ambient"></div>
        <div id="dg-global-glow"></div>
        <div class="dg-triangle-container" id="dg-triangle-grid"></div>
    </div>

    <header class="wizard-header">
        <div class="top-progress-container">
            <div class="top-progress-bar" id="form-progress"></div>
        </div>
        <div class="header-inner">
            <div class="brand-logo">
                <span class="brand-pulse"></span> Hire Talent
            </div>
            <a href="<?php echo home_url(); ?>" class="exit-link">
                <i class="fa-solid fa-xmark"></i> Exit
            </a>
        </div>
    </header>

    <main class="wizard-main">
        
        <form id="hire-wizard-form" autocomplete="off" onsubmit="event.preventDefault();">
            
            <div id="step-1" class="wizard-step is-visible">
                <div class="step-headings">
                    <h2 class="step-title">What kind of talent are you hiring?</h2>
                    <p class="step-subtitle">Choose the role that you need to fill first.</p>
                </div>

                <div class="selection-grid selection-grid-2">
                    <button type="button" class="selection-card card-vertical" tabindex="0" data-step="1" data-field="role" data-value="Developers">
                        <div class="card-icon"><i class="fa-solid fa-code"></i></div>
                        <span class="card-label">Developers</span>
                        <span class="card-desc">Front-end, back-end, mobile, and more</span>
                    </button>

                    <button type="button" class="selection-card card-vertical" tabindex="0" data-step="1" data-field="role" data-value="Designers">
                        <div class="card-icon"><i class="fa-solid fa-palette"></i></div>
                        <span class="card-label">Designers</span>
                        <span class="card-desc">UI/UX, product, graphic, and more</span>
                    </button>

                    <button type="button" class="selection-card card-vertical" tabindex="0" data-step="1" data-field="role" data-value="Marketers">
                        <div class="card-icon"><i class="fa-solid fa-bullhorn"></i></div>
                        <span class="card-label">Marketers</span>
                        <span class="card-desc">Paid search, SEO, email, and more</span>
                    </button>

                    <button type="button" class="selection-card card-vertical" tabindex="0" data-step="1" data-field="role" data-value="Product Managers">
                        <div class="card-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <span class="card-label">Product managers</span>
                        <span class="card-desc">Software, growth, data, and more</span>
                    </button>
                </div>

                <div class="nav-controls nav-controls-right">
                    <button type="button" id="btn-next-1" class="btn-primary next-btn" data-current="1" data-next="2" disabled>
                        Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div id="step-2" class="wizard-step">
                <div class="step-headings">
                    <h2 class="step-title">What are the working hours per week?</h2>
                    <p class="step-subtitle">This is an estimate. You can decide later if you're not sure.</p>
                </div>

                <div class="selection-list">
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="2" data-field="hours" data-value="40+ hrs/week">
                        <div class="card-icon"><i class="fa-solid fa-clock"></i></div>
                        <span class="card-label">40+ hrs/week</span>
                    </button>
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="2" data-field="hours" data-value="20-40 hrs/week">
                        <div class="card-icon"><i class="fa-solid fa-hourglass-half"></i></div>
                        <span class="card-label">20-40 hrs/week</span>
                    </button>
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="2" data-field="hours" data-value="Less than 20 hrs/week">
                        <div class="card-icon"><i class="fa-solid fa-hourglass-end"></i></div>
                        <span class="card-label">Less than 20 hrs/week</span>
                    </button>
                </div>

                <div class="nav-controls">
                    <button type="button" class="btn-back back-btn" data-current="2" data-prev="1">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </button>
                    <button type="button" id="btn-next-2" class="btn-primary next-btn" data-current="2" data-next="3" disabled>
                        Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div id="step-3" class="wizard-step">
                <div class="step-headings">
                    <h2 class="step-title">When would you like them to start?</h2>
                    <p class="step-subtitle">With Design by Global, you can hire a vetted professional in 72 hours.</p>
                </div>

                <div class="selection-list">
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="3" data-field="timeline" data-value="In 1-2 weeks">
                        <div class="card-icon"><i class="fa-solid fa-bolt"></i></div>
                        <span class="card-label">In 1-2 weeks</span>
                    </button>
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="3" data-field="timeline" data-value="In 2-4 weeks">
                        <div class="card-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <span class="card-label">In 2-4 weeks</span>
                    </button>
                    <button type="button" class="selection-card card-horizontal" tabindex="0" data-step="3" data-field="timeline" data-value="Flexible">
                        <div class="card-icon"><i class="fa-solid fa-calendar-minus"></i></div>
                        <span class="card-label">My timeline is flexible</span>
                    </button>
                </div>

                <div class="nav-controls">
                    <button type="button" class="btn-back back-btn" data-current="3" data-prev="2">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </button>
                    <button type="button" id="btn-next-3" class="btn-primary next-btn" data-current="3" data-next="4" disabled>
                        Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div id="step-4" class="wizard-step">
                <div class="step-headings">
                    <h2 class="step-title">Average rate is £60-100+ per hour.</h2>
                    <p class="step-subtitle">Only the top 2.3% of vetted talent pass our pipeline. Does this fit your budget?</p>
                </div>

                <div class="selection-grid selection-grid-3">
                    <button type="button" class="selection-card card-center" tabindex="0" data-step="4" data-field="budget_fit" data-value="Yes">
                        <span class="card-label">Yes</span>
                    </button>
                    <button type="button" class="selection-card card-center" tabindex="0" data-step="4" data-field="budget_fit" data-value="Maybe">
                        <span class="card-label">Maybe</span>
                    </button>
                    <button type="button" class="selection-card card-center" tabindex="0" data-step="4" data-field="budget_fit" data-value="No">
                        <span class="card-label">No</span>
                    </button>
                </div>

                <div class="nav-controls">
                    <button type="button" class="btn-back back-btn" data-current="4" data-prev="3">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </button>
                    <button type="button" id="btn-next-4" class="btn-primary next-btn" data-current="4" data-next="5" disabled>
                        Continue <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div id="step-5" class="wizard-step form-container">
                <div class="step-headings">
                    <h2 class="step-title">Almost done!</h2>
                    <p class="step-subtitle">Enter your details so our concierge team can assist you.</p>
                </div>

                <div>
                    <div class="form-group">
                        <label class="form-label" for="client_name">Full Name <span>(Optional)</span></label>
                        <input type="text" id="client_name" class="form-input" placeholder="e.g. John Doe">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone_number">Phone Number</label>
                        <input type="tel" id="phone_number" class="form-input" placeholder="+44 20 7946 0958" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="company_email">Work Email</label>
                        <input type="email" id="company_email" class="form-input" placeholder="john@yourcompany.com" required>
                    </div>
                </div>

                <p class="form-disclaimer">
                    <i class="fa-solid fa-lock" style="margin-right: 4px;"></i> Protected by our Terms & Privacy Policy.
                </p>

                <div class="nav-controls">
                    <button type="button" class="btn-back back-btn" data-current="5" data-prev="4">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </button>
                    <button type="submit" id="btn-submit" class="btn-primary">
                        Send Request <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Seamless Success State (Replaces Form) -->
        <div id="seamless-success" class="seamless-success">
            <div class="success-icon-wrap">
                <i class="fa-solid fa-check"></i>
            </div>
            <h2 class="success-title">Request Received!</h2>
            <p class="success-text">
                Thank you for choosing Design by Global. Our concierge team is reviewing your requirements and will contact you via email within <strong>24 hours</strong>.
            </p>
            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>
            <p class="progress-label">Returning to home...</p>
        </div>

    </main>

    <script>
        const arc_ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

        document.addEventListener('DOMContentLoaded', () => {
            
            // --- Interactive Mesh Engine ---
            const triangleBase = 60;
            const gridContainer = document.getElementById("dg-triangle-grid");
            const glow = document.getElementById("dg-global-glow");

            const instantiateGrid = () => {
                if(!gridContainer) return;
                gridContainer.innerHTML = '';
                
                const width = window.innerWidth;
                const height = window.innerHeight;

                let columns = Math.ceil(width / (triangleBase * 2)) + 2;
                let rows = Math.ceil(height / (triangleBase * 1.733)) + 2;
                gridContainer.style.setProperty('--columns', columns);

                const fragment = document.createDocumentFragment();

                for (let y = 0; y < rows; y++) {
                    for (let x = 0; x < columns; x++) {
                        let el = document.createElement("div");
                        el.classList.add("dg-triangle-set");
                        if (y % 2 === 0) el.classList.add("dg-triangle-set--offset");
                        fragment.appendChild(el);
                    }
                }
                gridContainer.appendChild(fragment);
            };

            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(instantiateGrid, 200);
            });

            instantiateGrid();

            let isTickingMesh = false;
            document.addEventListener('mousemove', (event) => {
                if (!isTickingMesh) {
                    window.requestAnimationFrame(() => {
                        if(glow) {
                            glow.style.left = `${event.clientX}px`;
                            glow.style.top = `${event.clientY}px`;
                        }
                        isTickingMesh = false;
                    });
                    isTickingMesh = true;
                }
            });
            
            if(glow) {
                glow.style.left = '50%';
                glow.style.top = '50%';
            }


            // --- Form Wizard Engine ---
            const leadData = {
                role: '', hours: '', timeline: '', budget_fit: '',
                fullname: '', phone: '', email: '' 
            };

            const cards = document.querySelectorAll('.selection-card');
            const nextButtons = document.querySelectorAll('.next-btn');
            const backButtons = document.querySelectorAll('.back-btn');
            const progressBar = document.getElementById('form-progress');

            // Function to update progress bar
            const updateProgress = (step) => {
                const percentage = (step / 5) * 100;
                progressBar.style.width = percentage + '%';
            };

            // Allow 'Enter' key to act as a click on focused cards
            cards.forEach(card => {
                card.addEventListener('keydown', function(e) {
                    if(e.key === 'Enter') {
                        e.preventDefault();
                        this.click();
                    }
                });

                card.addEventListener('click', function() {
                    const stepNum = this.getAttribute('data-step');
                    const field = this.getAttribute('data-field');
                    const value = this.getAttribute('data-value');
                    
                    const stepCards = document.querySelectorAll(`.selection-card[data-step="${stepNum}"]`);
                    stepCards.forEach(c => c.classList.remove('is-active'));

                    this.classList.add('is-active');

                    leadData[field] = value;
                    const targetNextBtn = document.getElementById(`btn-next-${stepNum}`);
                    if(targetNextBtn) {
                        targetNextBtn.disabled = false;
                    }
                });
            });

            // Handle Next Buttons
            nextButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    if(!this.disabled) {
                        const current = parseInt(this.getAttribute('data-current'));
                        const next = parseInt(this.getAttribute('data-next'));
                        
                        document.getElementById(`step-${current}`).classList.remove('is-visible');
                        document.getElementById(`step-${next}`).classList.add('is-visible');
                        updateProgress(next);
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                });
            });

            // Handle Back Buttons
            backButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const current = parseInt(this.getAttribute('data-current'));
                    const prev = parseInt(this.getAttribute('data-prev'));
                    
                    document.getElementById(`step-${current}`).classList.remove('is-visible');
                    document.getElementById(`step-${prev}`).classList.add('is-visible');
                    updateProgress(prev);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // Handle Form Submission
            document.getElementById('hire-wizard-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = document.getElementById('btn-submit');
                const originalText = submitBtn.innerHTML; 
                const theForm = document.getElementById('hire-wizard-form');
                const seamlessSuccess = document.getElementById('seamless-success');
                
                submitBtn.innerHTML = 'Sending... <i class="fa-solid fa-spinner fa-spin"></i>';
                submitBtn.disabled = true;

                leadData.fullname = document.getElementById('client_name').value || 'N/A';
                leadData.phone = document.getElementById('phone_number').value; 
                leadData.email = document.getElementById('company_email').value;

                const formData = new FormData();
                formData.append('action', 'arc_submit_hire_request');
                
                for (const key in leadData) {
                    formData.append(key, leadData[key]);
                }

                fetch(arc_ajax_url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        // Hide form and show seamless success message in its place
                        theForm.style.display = 'none';
                        seamlessSuccess.classList.add('is-active');
                        
                        setTimeout(() => {
                            window.location.href = "<?php echo home_url(); ?>";
                        }, 4000);
                        
                    } else {
                        alert('System failed to process. Please try again.');
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        });
    </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Hire Talent",
  "url": "https://designbyglobal.com/hire-talent/"
}
</script>

    <?php wp_footer(); ?>
</body>
</html>