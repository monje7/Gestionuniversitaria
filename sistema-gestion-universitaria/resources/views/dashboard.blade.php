<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('listado de estudiantes') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100 p-4">

        <div class="max-w-2xl mx-auto">
    
            <!-- Formulario para registrar usuarios -->
            <form id="userForm" class="mb-4">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="name" name="name" class="w-full border p-2">
                </div>
                <div class="mb-4">
                    <label for="course" class="block text-gray-700 text-sm font-bold mb-2">Curso:</label>
                    <input type="text" id="course" name="course" class="w-full border p-2">
                </div>
                <div class="mb-4">
                    <label for="professor" class="block text-gray-700 text-sm font-bold mb-2">Profesor:</label>
                    <input type="text" id="professor" name="professor" class="w-full border p-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Usuario</button>
            </form>
    
            <!-- Tabla para listar usuarios -->
            <table id="userTable" class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b p-2">ID</th>
                        <th class="border-b p-2">Nombre</th>
                        <th class="border-b p-2">Curso</th>
                        <th class="border-b p-2">Profesor</th>
                        <th class="border-b p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se listarán dinámicamente los usuarios -->
                </tbody>
            </table>
        </div>
</x-app-layout>
