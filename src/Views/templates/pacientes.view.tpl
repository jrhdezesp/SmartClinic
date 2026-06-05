<div class="container section-pad">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
        <h2 style="font-size:3rem; color:#111827;">Pacientes</h2>

        <a class="btn btn--primary"
           href="index.php?page=PacientesController&action=create">
            + Nuevo paciente
        </a>
    </div>

    <div style="
        background:#fff;
        border-radius:16px;
        overflow:hidden;
        box-shadow:0 4px 20px rgba(0,0,0,.08);
    ">

        <table style="width:100%; border-collapse:collapse;">

            <thead>
                <tr style="background:#033B9F; color:white;">
                    <th style="padding:15px;">ID</th>
                    <th style="padding:15px;">Identidad</th>
                    <th style="padding:15px;">Nombres</th>
                    <th style="padding:15px;">Apellidos</th>
                    <th style="padding:15px;">Fecha nacimiento</th>
                    <th style="padding:15px;">Teléfono</th>
                    <th style="padding:15px;">Dirección</th>
                    <th style="padding:15px;">Acciones</th>
                </tr>
            </thead>

            <tbody>

                {{foreach pacientes}}

                <tr style="border-bottom:1px solid #E5E7EB;">
                    <td style="padding:14px;">{{id}}</td>
                    <td style="padding:14px;">{{identidad}}</td>
                    <td style="padding:14px;">{{nombres}}</td>
                    <td style="padding:14px;">{{apellidos}}</td>
                    <td style="padding:14px;">{{fecha_nacimiento}}</td>
                    <td style="padding:14px;">{{telefono}}</td>
                    <td style="padding:14px;">{{direccion}}</td>

                    <td style="padding:14px;">

                        <a href="index.php?page=PacientesController&action=edit&id={{id}}"
                           style="
                                background:#0260CB;
                                color:white;
                                padding:8px 12px;
                                border-radius:8px;
                                text-decoration:none;
                                margin-right:5px;
                           ">
                            Editar
                        </a>

                        <a href="index.php?page=PacientesController&action=delete&id={{id}}"
                           onclick="return confirm('¿Eliminar este paciente?')"
                           style="
                                background:#D63031;
                                color:white;
                                padding:8px 12px;
                                border-radius:8px;
                                text-decoration:none;
                           ">
                            Eliminar
                        </a>

                    </td>
                </tr>

                {{endfor pacientes}}

            </tbody>

        </table>

    </div>

</div>