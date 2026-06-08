<div class="container section-pad">

    <div style="max-width:600px; margin:0 auto;">
        <h2 style="font-size:2.5rem; color:#111827; margin-bottom:1.5rem;">Editar cita</h2>

        <div style="background:#fff; border-radius:16px; padding:2rem; box-shadow:0 4px 20px rgba(0,0,0,.08);">
            <form method="POST" action="index.php?page=CitasController&action=edit&id={{cita.id}}" novalidate>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Paciente</label>
                    <select name="paciente_id" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                        {{foreach pacientes}}
                        <option value="{{id}}" {{if cita.paciente_id}}{{if id}}selected{{endif}}{{endif}}>
                            {{nombres}} {{apellidos}} ({{identidad}})
                        </option>
                        {{endfor pacientes}}
                    </select>
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Médico</label>
                    <select name="medico_id" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                        {{foreach medicos}}
                        <option value="{{id}}" {{if cita.medico_id}}{{if id}}selected{{endif}}{{endif}}>
                            Dr/a {{nombres}} {{apellidos}} - {{nombre_especialidad}}
                        </option>
                        {{endfor medicos}}
                    </select>
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Fecha y hora</label>
                    <input type="datetime-local" name="fecha_hora" value="{{cita.fecha_hora}}" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Estado</label>
                    <select name="estado_id" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                        <option value="1" {{if cita.estado_id}}{{if estado_id}}selected{{endif}}{{endif}}>Pendiente</option>
                        <option value="2" {{if cita.estado_id}}{{if estado_id}}selected{{endif}}{{endif}}>Cancelada</option>
                        <option value="3" {{if cita.estado_id}}{{if estado_id}}selected{{endif}}{{endif}}>Completada</option>
                    </select>
                </div>

                <div style="display:flex; gap:1rem;">
                    <button type="submit" style="flex:1; background:#0b4bb8; color:#fff; padding:0.95rem; border:none; border-radius:8px; font-weight:700; cursor:pointer; font-size:1rem;">
                        Guardar cambios
                    </button>
                    <a href="index.php?page=CitasController&action=index" style="flex:1; background:#f8fafc; color:#0f172a; padding:0.95rem; border:1px solid #e2e8f0; border-radius:8px; font-weight:700; text-decoration:none; text-align:center; font-size:1rem;">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
