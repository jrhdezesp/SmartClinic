<style>
  .dashboard-header {
    margin-bottom: 2rem;
  }

  .dashboard-header h2 {
    color: var(--cedro);
    font-size: clamp(1.7rem, 2.5vw, 2.3rem);
    font-weight: 800;
  }

  .dashboard-header p {
    color: rgba(3, 59, 159, 0.72);
    margin-top: 0.55rem;
    max-width: 760px;
  }

  .dashboard-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.25rem;
    margin-top: 1.5rem;
  }

  .dash-card {
    background: #fffefe;
    border-radius: 18px;
    padding: 1.6rem;
    box-shadow: 0 10px 30px rgba(3, 59, 159, 0.1);
    border: 1px solid rgba(153, 222, 252, 0.7);
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
    min-height: 190px;
  }

  .dash-card .icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: rgba(153, 222, 252, 0.24);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: var(--cedro);
  }

  .dash-card .icon svg {
    width: 1.35rem;
    height: 1.35rem;
    fill: currentColor;
    display: block;
  }

  .dash-card h3 {
    color: var(--cedro);
    font-size: 1.1rem;
  }

  .dash-card p {
    color: rgba(3, 59, 159, 0.72);
    font-size: 0.95rem;
    line-height: 1.6;
  }

  .dash-card .note {
    margin-top: auto;
    color: var(--dorado);
    font-weight: 700;
    font-size: 0.92rem;
  }
</style>

<div class="dashboard-header">
  <h2>Panel de Administración y Recepción</h2>
  <p>Este espacio queda listo para coordinar la operación diaria de SmartClinic mientras se desarrollan los módulos de pacientes, médicos y citas.</p>
</div>

<div class="dashboard-cards">
  <div class="dash-card">
    <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5z"/></svg></div>
    <h3>Pacientes</h3>
    <p>Registro básico para datos personales, contacto y dirección de cada paciente.</p>
    <span class="note">Módulo por preparar</span>
  </div>
  <div class="dash-card">
    <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm-8 1a3 3 0 1 0-3-3 3 3 0 0 0 3 3zm8 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></div>
    <h3>Médicos</h3>
    <p>Espacio para administrar nombre, colegiatura, especialidad y teléfono del médico.</p>
    <span class="note">Tu parte del proyecto</span>
  </div>
  <div class="dash-card">
    <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4V4zm3 3v2h10V7H7zm0 4v2h10v-2H7zm0 4v2h7v-2H7z"/></svg></div>
    <h3>Citas</h3>
    <p>Control de agenda, estados de cita y fechas de atención para recepción.</p>
    <span class="note">En construcción</span>
  </div>
  <div class="dash-card">
    <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M6 3h12a1 1 0 0 1 1 1v16l-3-2-3 2-3-2-3 2-3-2V4a1 1 0 0 1 1-1zm2 4v2h8V7H8zm0 4v2h8v-2H8zm0 4v2h5v-2H8z"/></svg></div>
    <h3>Usuarios</h3>
    <p>Administración de accesos, roles y sesiones para el personal autorizado.</p>
    <span class="note">Base de seguridad lista</span>
  </div>
</div>