<div class="container section-pad">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
        <h2 style="font-size:3rem; color:#111827;">Citas</h2>

        {{if showCrudActions}}
        <a class="btn btn--primary" href="index.php?page=CitasController&action=agendar">
            + Nueva cita
        </a>
        {{endif showCrudActions}}
    </div>

    {{if citas}}
    <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,.08);">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#033B9F; color:white;">
                    <th style="padding:15px;">ID</th>
                    <th style="padding:15px;">Paciente</th>
                    <th style="padding:15px;">Médico</th>
                    <th style="padding:15px;">Especialidad</th>
                    <th style="padding:15px;">Fecha y Hora</th>
                    <th style="padding:15px;">Estado</th>
                    <th style="padding:15px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{foreach citas}}
                <tr style="border-bottom:1px solid #E5E7EB;">
                    <td style="padding:14px;">{{id}}</td>
                    <td style="padding:14px;">{{paciente_nombres}} {{paciente_apellidos}}</td>
                    <td style="padding:14px;">{{medico_nombres}} {{medico_apellidos}}</td>
                    <td style="padding:14px;">{{nombre_especialidad}}</td>
                    <td style="padding:14px;">{{fecha_hora}}</td>
                    <td style="padding:14px;">
                        <span style="background:#EFF6FF; color:#0b4bb8; padding:4px 12px; border-radius:999px; font-size:.85rem; font-weight:700;">
                            {{nombre_estado}}
                        </span>
                    </td>
                    <td style="padding:14px;">
                        {{if ~showCrudActions}}
                        <a href="index.php?page=CitasController&action=edit&id={{id}}" style="background:#0260CB; color:white; padding:8px 12px; border-radius:8px; text-decoration:none; margin-right:5px;">
                            Editar
                        </a>
                        <a href="index.php?page=CitasController&action=delete&id={{id}}" onclick="return confirm('¿Cancelar esta cita?')" style="background:#D63031; color:white; padding:8px 12px; border-radius:8px; text-decoration:none;">
                            Cancelar
                        </a>
                        {{endif ~showCrudActions}}

                        {{ifnot ~showCrudActions}}
                        <span style="color:#475569; font-size:.95rem;">Solo lectura - sin permisos de edición</span>
                        {{endifnot ~showCrudActions}}
                    </td>
                </tr>
                {{endfor citas}}
            </tbody>
        </table>
    </div>
    {{endif citas}}

    {{ifnot citas}}
    <div style="background:#fff; border-radius:16px; padding:2rem; text-align:center; color:#64748b;">
        <p style="font-size:1.1rem;">No hay citas agendadas.</p>
    </div>
    {{endifnot citas}}

</div>
