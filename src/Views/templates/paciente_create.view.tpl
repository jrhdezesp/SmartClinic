<div class="container section-pad">
  <div class="form-card">
    <div style="margin-bottom:30px;">
      <h2 style="color:#033B9F; margin-bottom:10px; font-size:2rem;">Registrar Paciente</h2>
      <p style="color:#636366;">Complete la información del paciente para registrarlo en el sistema.</p>
    </div>

    <form method="POST">
      <div class="form-grid">
        <div class="form-group">
          <label>Identidad</label>
          <input type="text" name="identidad" required>
        </div>

        <div class="form-group">
          <label>Nombres</label>
          <input type="text" name="nombres" required>
        </div>

        <div class="form-group">
          <label>Apellidos</label>
          <input type="text" name="apellidos" required>
        </div>

        <div class="form-group">
          <label>Teléfono</label>
          <input type="text" name="telefono" required>
        </div>

        <div class="form-group">
          <label>Fecha de nacimiento</label>
          <input type="date" name="fecha_nacimiento" required>
        </div>
      </div>

      <div class="form-group" style="margin-top:20px;">
        <label>Dirección</label>
        <textarea name="direccion" rows="4"></textarea>
      </div>

      <div class="form-actions">
        <a href="index.php?page=PacientesController&action=index" class="btn btn--outline">Cancelar</a>
        <button type="submit" class="btn btn--primary">Guardar Paciente</button>
      </div>
    </form>
  </div>
</div>
