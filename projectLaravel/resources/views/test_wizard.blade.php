<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Wizard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Test Wizard Progress</h1>
        
        <!-- Progress Stepper -->
        <div class="flex items-center justify-between mb-6 px-4">
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step1-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-blue-600 text-white">1</div>
                    <p id="step1-label" class="text-xs font-medium text-blue-600">Bien</p>
                </div>
                <div class="flex-1 h-1 mx-2 bg-gray-200 min-w-[40px]" id="progress1"></div>
            </div>
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step2-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-gray-200 text-gray-500">2</div>
                    <p id="step2-label" class="text-xs font-medium text-gray-400">Trabajo</p>
                </div>
                <div class="flex-1 h-1 mx-2 bg-gray-200 min-w-[40px]" id="progress2"></div>
            </div>
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step3-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-gray-200 text-gray-500">3</div>
                    <p id="step3-label" class="text-xs font-medium text-gray-400">Detalles</p>
                </div>
            </div>
        </div>

        <div class="mt-8 p-4 bg-blue-50 rounded-lg">
            <p class="text-sm text-blue-900">
                <strong>¿Ves las líneas grises entre los círculos?</strong><br>
                Si NO las ves, el problema es que Tailwind no está compilando la clase <code class="bg-white px-1 rounded">min-w-[40px]</code>
            </p>
        </div>

        <div class="mt-4 flex gap-2">
            <button onclick="testStep2()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Simular Paso 2
            </button>
            <button onclick="testStep3()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Simular Paso 3
            </button>
            <button onclick="reset()" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                Reset
            </button>
        </div>
    </div>

    <script>
        function testStep2() {
            // Paso 1 completado (azul)
            document.getElementById('progress1').classList.remove('bg-gray-200');
            document.getElementById('progress1').classList.add('bg-blue-600');
            
            // Paso 2 activo (azul)
            document.getElementById('step2-indicator').classList.remove('bg-gray-200', 'text-gray-500');
            document.getElementById('step2-indicator').classList.add('bg-blue-600', 'text-white');
            document.getElementById('step2-label').classList.remove('text-gray-400');
            document.getElementById('step2-label').classList.add('text-blue-600');
        }

        function testStep3() {
            testStep2();
            
            // Paso 2 completado (azul)
            document.getElementById('progress2').classList.remove('bg-gray-200');
            document.getElementById('progress2').classList.add('bg-blue-600');
            
            // Paso 3 activo (azul)
            document.getElementById('step3-indicator').classList.remove('bg-gray-200', 'text-gray-500');
            document.getElementById('step3-indicator').classList.add('bg-blue-600', 'text-white');
            document.getElementById('step3-label').classList.remove('text-gray-400');
            document.getElementById('step3-label').classList.add('text-blue-600');
        }

        function reset() {
            // Reset paso 1
            document.getElementById('step1-indicator').classList.add('bg-blue-600', 'text-white');
            document.getElementById('step1-label').classList.add('text-blue-600');
            document.getElementById('progress1').classList.add('bg-gray-200');
            document.getElementById('progress1').classList.remove('bg-blue-600');
            
            // Reset paso 2
            document.getElementById('step2-indicator').classList.add('bg-gray-200', 'text-gray-500');
            document.getElementById('step2-indicator').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('step2-label').classList.add('text-gray-400');
            document.getElementById('step2-label').classList.remove('text-blue-600');
            document.getElementById('progress2').classList.add('bg-gray-200');
            document.getElementById('progress2').classList.remove('bg-blue-600');
            
            // Reset paso 3
            document.getElementById('step3-indicator').classList.add('bg-gray-200', 'text-gray-500');
            document.getElementById('step3-indicator').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('step3-label').classList.add('text-gray-400');
            document.getElementById('step3-label').classList.remove('text-blue-600');
        }
    </script>
</body>
</html>
