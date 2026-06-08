<div class="container section-pad">

    <div style="max-width:600px; margin:0 auto;">
        <h2 style="font-size:2.5rem; color:#111827; margin-bottom:1.5rem;">Agendar una cita</h2>

        {{if error}}
        <div style="background:#FEE2E2; border:1px solid #FCA5A5; border-radius:12px; padding:1rem; margin-bottom:1.5rem; color:#991B1B;">
            {{error}}
        </div>
        {{endif error}}

        <div style="background:#fff; border-radius:16px; padding:2rem; box-shadow:0 4px 20px rgba(0,0,0,.08);">
            <form method="POST" action="index.php?page=CitasController&action=agendar" novalidate>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Paciente</label>
                    <select name="paciente_id" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                        <option value="">-- Selecciona un paciente --</option>
                        {{foreach pacientes}}
                        <option value="{{id}}">{{nombres}} {{apellidos}} ({{identidad}})</option>
                        {{endfor pacientes}}
                    </select>
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Médico</label>
                    <select name="medico_id" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                        <option value="">-- Selecciona un médico --</option>
                        {{foreach medicos}}
                        <option value="{{id}}">Dr/a {{nombres}} {{apellidos}} - {{nombre_especialidad}}</option>
                        {{endfor medicos}}
                    </select>
                </div>

                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; font-weight:700; color:#0f172a; margin-bottom:0.5rem;">Fecha y hora de la cita</label>
                    <input type="datetime-local" name="fecha_hora" required style="width:100%; padding:0.75rem; border:1px solid #e2e8f0; border-radius:8px; font-size:1rem;">
                </div>

                <div style="display:flex; gap:1rem;">
                    <button type="submit" style="flex:1; background:#0b4bb8; color:#fff; padding:0.95rem; border:none; border-radius:8px; font-weight:700; cursor:pointer; font-size:1rem;">
                        Agendar cita
                    </button>
                    <a href="index.php?page=CitasController&action=index" style="flex:1; background:#f8fafc; color:#0f172a; padding:0.95rem; border:1px solid #e2e8f0; border-radius:8px; font-weight:700; text-decoration:none; text-align:center; font-size:1rem;">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>
