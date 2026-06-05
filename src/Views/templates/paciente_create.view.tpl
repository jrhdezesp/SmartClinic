<div class="container" style="max-width:800px; margin:140px auto 100px auto;">


<div style="
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(3,59,159,.12);
    border:1px solid #EAF5FD;
">

    <div style="margin-bottom:30px;">
        <h2 style="
            color:#033B9F;
            margin-bottom:10px;
            font-size:2rem;
        ">
            Registrar Paciente
        </h2>

        <p style="color:#636366;">
            Complete la información del paciente para registrarlo en el sistema.
        </p>
    </div>

    <form method="POST">

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label><strong>Identidad</strong></label>
                <input type="text" name="identidad" required
                    style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;">
            </div>

            <div>
                <label><strong>Teléfono</strong></label>
                <input type="text" name="telefono" required
                    style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;">
            </div>

            <div>
                <label><strong>Nombres</strong></label>
                <input type="text" name="nombres" required
                    style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;">
            </div>

            <div>
                <label><strong>Apellidos</strong></label>
                <input type="text" name="apellidos" required
                    style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;">
            </div>

            <div>
                <label><strong>Fecha de nacimiento</strong></label>
                <input type="date" name="fecha_nacimiento" required
                    style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;">
            </div>

        </div>

        <div style="margin-top:20px;">
            <label><strong>Dirección</strong></label>
            <textarea name="direccion" rows="3"
                style="width:100%; padding:12px; border:1px solid #C7C7CC; border-radius:10px;"></textarea>
        </div>

        <div style="
            margin-top:30px;
            display:flex;
            gap:15px;
            justify-content:flex-end;
        ">

            <a href="index.php?page=PacientesController&action=index"
               style="
                    padding:12px 25px;
                    border-radius:10px;
                    border:1px solid #C7C7CC;
                    text-decoration:none;
                    color:#636366;
               ">
                Cancelar
            </a>

            <button type="submit"
                style="
                    background:#033B9F;
                    color:white;
                    border:none;
                    padding:12px 25px;
                    border-radius:10px;
                    font-weight:600;
                    cursor:pointer;
                ">
                Guardar Paciente
            </button>

        </div>

    </form>

</div>


</div>
