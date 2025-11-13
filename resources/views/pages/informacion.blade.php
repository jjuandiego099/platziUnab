@extends('pages.layouts.app')

@section('content')

<style>
    /* Tarjeta principal */
    .info-card {
        border-radius: 18px;
        border-left: 6px solid #ff9800;
        padding: 30px;
        background: #ffffff;
        box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.12);
    }

    /* Títulos */
    .info-title {
        font-weight: 900;
        color: #333;
    }

    .info-subtitle {
        font-weight: 800;
        color: #ff9800;
        margin-top: 25px;
        margin-bottom: 15px;
    }

    /* Acordeón */
    .accordion-button {
        font-weight: 700 !important;
        background: #fff6e9 !important;
        border-left: 4px solid #ff9800 !important;
        color: #333 !important;
    }

    .accordion-button:not(.collapsed) {
        background: #ffe3c2 !important;
        color: #333 !important;
    }

    .accordion-button:hover {
        background: #ffeacc !important;
    }

    .accordion-body {
        background: white;
        border-left: 4px solid #ff9800;
    }

    /* Iconos */
    .icon-orange {
        color: #ff9800;
        font-size: 26px;
    }
</style>


<div class="info-card">

    <h1 class="info-title">Información</h1>

    <p class="text-secondary mb-4">
        Aquí encontrarás detalles importantes sobre el uso de la plataforma, soporte técnico,
        preguntas frecuentes y documentación relevante.
    </p>

    <!-- FAQ -->
    <h3 class="info-subtitle">Preguntas Frecuentes</h3>

    <div class="accordion" id="faqAccordion">

        <!-- Pregunta 1 -->
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="q1">
                <button class="accordion-button collapsed  p-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#c1">
                    ¿Cómo accedo a mis cursos?
                </button>
            </h2>
            <div id="c1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body  p-3">
                    Puedes acceder a tus cursos desde el menú lateral en la sección <strong>Mis Cursos</strong>.
                </div>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="q2">
                <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#c2">
                    ¿Cómo descargo certificados?
                </button>
            </h2>
            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body  p-3">
                    Los certificados estarán disponibles cuando completes un curso al 100%.
                </div>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="q3">
                <button class="accordion-button collapsed  p-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#c3">
                    ¿Cómo contacto soporte?
                </button>
            </h2>
            <div id="c3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body  p-3">
                    Puedes contactarnos en <strong>soporte@unabvirtual.edu.co</strong>.
                </div>
            </div>
        </div>
    </div>

    <!-- SOPORTE -->
    <h3 class="info-subtitle">Soporte Técnico</h3>
    <div class="d-flex align-items-center mb-3">
        <span class="material-symbols-rounded icon-orange me-2">support_agent</span>
        <span class="text-secondary">soporte@unabvirtual.edu.co</span>
    </div>

    <!-- POLÍTICA DE PRIVACIDAD -->
    <h3 class="info-subtitle">Política de Privacidad</h3>

    <div class="accordion" id="policyAccordion">
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="p1">
                <button class="accordion-button collapsed  p-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#pc1">
                    Ver Política de Privacidad
                </button>
            </h2>
            <div id="pc1" class="accordion-collapse collapse" data-bs-parent="#policyAccordion">
                <div class="accordion-body  p-3">
                    La UNAB garantiza la protección de tus datos personales según la ley. Solo se usan
                    para fines académicos y de mejora de la plataforma. Nunca se compartirán sin tu autorización.
                </div>
            </div>
        </div>
    </div>

</div>

@endsection