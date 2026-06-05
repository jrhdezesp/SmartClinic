<div class="container" style="max-width:900px; margin:140px auto 100px auto;">

{{with paciente}}

<div style="background:#fff;padding:40px;border-radius:20px;box-shadow:0 10px 30px rgba(3,59,159,.12);border:1px solid #EAF5FD;">

    <div style="margin-bottom:30px;">
        <h2 style="color:#033B9F;margin-bottom:10px;">
            Editar Paciente
        </h2>

        <p style="color:#636366;">
            Actualice la información del paciente.
        </p>
    </div>

    <form method="POST" action="index.php?page=PacientesController&action=edit&id={{id}}">

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:25px;">

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">
                    Identidad
                </label>

                <input type="text" name="identidad" value="{{identidad}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">
                    Teléfono
                </label>

                <input type="text" name="telefono" value="{{telefono}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">
                    Nombres
                </label>

                <input type="text" name="nombres" value="{{nombres}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">
                    Apellidos
                </label>

                <input type="text" name="apellidos" value="{{apellidos}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">
                    Fecha de nacimiento
                </label>

                <input type="date" name="fecha_nacimiento" value="{{fecha_nacimiento}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

        </div>

        <div style="margin-top:20px;">
            <label style="display:block;margin-bottom:8px;font-weight:600;">
                Dirección
            </label>

            <textarea name="direccion" rows="4" style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">{{direccion}}</textarea>
        </div>

        <div style="margin-top:30px;display:flex;justify-content:flex-end;gap:15px;">

            <a href="index.php?page=PacientesController&action=index"
               style="padding:12px 25px;border:1px solid #C7C7CC;border-radius:10px;text-decoration:none;color:#636366;">
                Cancelar
            </a>

            <button type="submit"
                    style="background:#033B9F;color:#fff;border:none;padding:12px 25px;border-radius:10px;font-weight:600;cursor:pointer;">
                Actualizar Paciente
            </button>

        </div>

    </form>

</div>

{{endwith paciente}}

</div>