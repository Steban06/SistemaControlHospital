
<!-- Add AC Modal -->
<!-- Add AC Modal -->
<div id="addACModal" class="hidden relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-7xl">
                <form action="{{ route('aires-acondicionados.store') }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-8 sm:pb-4">
                        <div class="flex flex-col gap-1 text-center sm:text-left mb-8 border-b border-gray-100 pb-4">
                            <h2 class="font-bold text-xl text-gray-900">Agregar Nuevo Aire Acondicionado</h2>
                            <p class="text-sm text-gray-500">Complete la información técnica y administrativa del equipo de climatización.</p>
                        </div>
                        
                        <!-- Grid Container -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Section: Identificación y Estado -->
                            <div class="md:col-span-4 pb-1 border-b border-gray-50">
                                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-widest">1. Identificación del Equipo</h3>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="codigo">Código (BN)</label>
                                <input name="numero_bn" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="codigo" placeholder="Ej: AC-2026-0001" required>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="marca">Marca</label>
                                <input name="marca" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="marca" placeholder="Ej: Carrier" required>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="modelo">Modelo</label>
                                <input name="modelo" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="modelo" placeholder="Ej: Split 42QRF024">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="numeroSerie">Número de Serie</label>
                                <input name="numero_serie" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="numeroSerie" placeholder="Ej: CAR2024001234">
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="tipoUnidad">Tipo de Unidad</label>
                                <div class="relative">
                                    <select name="tipo_unidad" id="tipoUnidad" class="flex h-9 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" required>
                                        <option value="">Seleccione tipo...</option>
                                        <option value="Split Pared">Split Pared</option>
                                        <option value="Cassette">Cassette</option>
                                        <option value="Piso Techo">Piso Techo</option>
                                        <option value="Ventana">Ventana</option>
                                        <option value="Central">Central</option>
                                        <option value="Portátil">Portátil</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="estado">Estado Operativo</label>
                                <div class="relative">
                                    <select name="estado" id="estado" class="flex h-9 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" required>
                                        <option value="operativo">Operativo</option>
                                        <option value="mantenimiento">Mantenimiento</option>
                                        <option value="fuera de servicio">Fuera de servicio</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>


                            <!-- Section: Especificaciones -->
                            <div class="md:col-span-4 pt-4 pb-1 border-b border-gray-50">
                                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-widest">2. Especificaciones Técnicas</h3>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="capacidad">Capacidad</label>
                                <input name="capacidad" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="capacidad" placeholder="Ej: 24,000 BTU">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="voltaje">Voltaje</label>
                                <input name="voltaje" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="voltaje" placeholder="Ej: 220V">
                            </div>

                             <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="refrigerante">Refrigerante</label>
                                <div class="relative">
                                    <select name="refrigerante" id="refrigerante" class="flex h-9 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all">
                                        <option value="">Seleccione...</option>
                                        <option value="R410A">R410A</option>
                                        <option value="R22">R22</option>
                                        <option value="R32">R32</option>
                                        <option value="R134a">R134a</option>
                                        <option value="R407C">R407C</option>
                                    </select>
                                     <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="consumoEnergetico">Consumo</label>
                                <input name="consumo_energetico" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="consumoEnergetico" placeholder="Ej: 2.1 kW/h">
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="temperatura">Temp. Actual</label>
                                <input name="temperatura" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="temperatura" placeholder="Ej: 22°C">
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="horasUso">Horas Uso</label>
                                <input name="horas_uso" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="horasUso" placeholder="Ej: 4580">
                            </div>

                             <!-- Section: Ubicación y Fechas -->
                            <div class="md:col-span-4 pt-4 pb-1 border-b border-gray-50">
                                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-widest">3. Ubicación y Mantenimiento</h3>
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="ubicacion">Ubicación</label>
                                <input name="ubicacion" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="ubicacion" placeholder="Ej: UCI - Piso 3">
                            </div>

                            <div class="space-y-1.5 md:col-span-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="area">Área Específica</label>
                                <input name="area_especifica" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="area" placeholder="Ej: Sala 1">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="responsable">Responsable</label>
                                <input name="responsable" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="responsable" placeholder="Ej: Ing. Méndez">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="fechaInstalacion">F. Instalación</label>
                                <input type="date" name="fecha_instalacion" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="fechaInstalacion">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="ultimoMantenimiento">Último Mant.</label>
                                <input type="date" name="ultimo_mantenimiento" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="ultimoMantenimiento">
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="proximoMantenimiento">Próximo Mant.</label>
                                <input type="date" name="proximo_mantenimiento" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="proximoMantenimiento">
                            </div>

                            <!-- Observaciones -->
                            <div class="space-y-2 md:col-span-4 pt-2">
                                <label class="text-xs font-semibold uppercase text-gray-500" for="observaciones">Observaciones Adicionales</label>
                                <textarea name="observaciones" class="flex min-h-[80px] w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="observaciones" placeholder="Detalles de garantía, notas técnicas o observaciones importantes..." rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                        <button type="button" onclick="document.getElementById('addACModal').classList.add('hidden')" class="w-full sm:w-auto inline-flex justify-center rounded-md bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all">Cancelar</button>
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 hover:shadow-md transition-all">Registrar Equipo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
