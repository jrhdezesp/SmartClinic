<div class="container" style="max-width:900px; margin:140px auto 100px auto;">

{{with medico}}

<div style="background:#fff;padding:40px;border-radius:20px;box-shadow:0 10px 30px rgba(3,59,159,.12);border:1px solid #EAF5FD;">

    <div style="margin-bottom:30px;">
        <h2 style="color:#033B9F;margin-bottom:10px;">Editar Médico</h2>

        <p style="color:#636366;">Actualice la información del médico.</p>
    </div>

    <form method="POST" action="index.php?page=MedicosController&action=edit&id={{id}}">

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:25px;">

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">Especialidad</label>
                <select name="especialidad_id" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
                    {{foreach especialidades}}
                        <option value="{{id}}" {{# ifEquals id ../medico.especialidad_id }}selected{{/ ifEquals}}>{{nombre_especialidad}}</option>
                    {{endfor especialidades}}
                </select>
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">N° Colegiatura</label>
                <input type="text" name="num_colegiatura" value="{{num_colegiatura}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">Nombres</label>
                <input type="text" name="nombres" value="{{nombres}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">Apellidos</label>
                <input type="text" name="apellidos" value="{{apellidos}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

            <div>
                <label style="display:block;margin-bottom:8px;font-weight:600;">Teléfono</label>
                <input type="text" name="telefono" value="{{telefono}}" required style="width:100%;padding:12px;border:1px solid #C7C7CC;border-radius:10px;">
            </div>

        </div>

        <div style="margin-top:20px;">
        </div>

        <div style="margin-top:30px;display:flex;justify-content:flex-end;gap:15px;">

            <a href="index.php?page=MedicosController&action=index" style="padding:12px 25px;border:1px solid #C7C7CC;border-radius:10px;text-decoration:none;color:#636366;">Cancelar</a>

            <button type="submit" style="background:#033B9F;color:#fff;border:none;padding:12px 25px;border-radius:10px;font-weight:600;cursor:pointer;">Actualizar Médico</button>

        </div>

    </form>

</div>

{{endwith medico}}

</div>
