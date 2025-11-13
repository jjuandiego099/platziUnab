<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>
        @page {
            margin: 0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .certificado {
            background: white;
            width: 90%;
            max-width: 1000px;
            padding: 60px 80px;
            border: 15px solid #667eea;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            position: relative;
            text-align: center;
            height: 643px;
        }
        
        .certificado::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 2px solid #764ba2;
            border-radius: 10px;
        }
        
        .header {
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 48px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .titulo {
            font-size: 42px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 10px;
        }
        
        .subtitulo {
            font-size: 18px;
            color: #666;
            font-style: italic;
            margin-bottom: 40px;
        }
        
        .texto-principal {
            font-size: 20px;
            color: #444;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .nombre-estudiante {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            text-transform: uppercase;
            margin: 20px 0;
            padding: 15px;
            border-top: 3px solid #764ba2;
            border-bottom: 3px solid #764ba2;
        }
        
        .nombre-curso {
            font-size: 28px;
            font-weight: bold;
            color: #764ba2;
            margin: 20px 0;
        }
        
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        
        .firma {
            text-align: center;
        }
        
        .linea-firma {
            width: 250px;
            border-top: 2px solid #333;
            margin: 10px auto;
        }
        
        .nombre-firma {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }
        
        .cargo-firma {
            font-size: 14px;
            color: #666;
            font-style: italic;
        }
        
        .fecha {
            font-size: 14px;
            color: #666;
            margin-top: 30px;
        }
        
        .sello {
            position: absolute;
            bottom: 50px;
            right: 80px;
            width: 120px;
            height: 120px;
            border: 5px solid #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            color: #667eea;
            text-align: center;
            transform: rotate(-15deg);
            opacity: 0.8;
        }
        
        .decoracion {
            position: absolute;
            font-size: 100px;
            color: rgba(102, 126, 234, 0.1);
        }
        
        .decoracion-1 { top: 20px; left: 20px; }
        .decoracion-2 { top: 20px; right: 20px; }
        .decoracion-3 { bottom: 20px; left: 20px; }
        .decoracion-4 { bottom: 20px; right: 20px; }
        
        
        

    @page {
        size: 297mm 210mm;  /* A4 horizontal explícito */
        margin: 0;
    }
    
    /* O también funciona así: */
    @page {
        size: landscape;
    }

    </style>
</head>
<body>
    <div class="certificado">
        <!-- Decoraciones -->
        <div class="decoracion decoracion-1">✦</div>
        <div class="decoracion decoracion-2">✦</div>
        <div class="decoracion decoracion-3">✦</div>
        <div class="decoracion decoracion-4">✦</div>
        
        <!-- Contenido -->
        <div class="header">
            <div class="logo">Platzi Unab</div>
            <div class="titulo">Certificado de Finalización</div>
            <div class="subtitulo">Se otorga el presente certificado a:</div>
        </div>
        
        <div class="nombre-estudiante">{{ $user->name }}</div>
        @role('student')
        <div class="texto-principal">
            Por haber completado exitosamente el curso
        </div>
        @endrole
         @role('teacher')
        <div class="texto-principal">
            Por haber creado exitosamente el curso
        </div>
        @endrole
        
        <div class="nombre-curso">"{{ $curso->titulo }}"</div>
         @role('student')
        <div class="texto-principal">
            Demostrando dedicación, compromiso y excelencia académica<br>
            en su proceso de aprendizaje.
        </div>
        @endrole
        @role('teacher')
        <div class="texto-principal">
            Demostrando dedicación, compromiso y excelencia académica<br>
            en su proceso de enseñanza.
        </div>
        @endrole
        
       
        
        <div class="fecha">
            Fecha de emisión: {{ now()->format('d/m/Y') }}
        </div>
        
        <div class="sello">
            CERTIFICADO<br>OFICIAL
        </div>
    </div>
</body>
</html>