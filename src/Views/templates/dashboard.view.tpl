<style>
  .dashboard-shell {
    width: 100%;
    max-width: 1120px;
    margin: 0 auto;
    padding: 2.5rem 1.5rem;
    display: grid;
    gap: 1.5rem;
    min-width: 0;
  }
  .hero-card {
    background: linear-gradient(135deg, #0b4bb8 0%, #0f6fe2 100%);
    border-radius: 24px;
    color: #fff;
    padding: 2rem;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 1.5rem;
    align-items: center;
    overflow: hidden;
    min-width: 0;
  }
  .hero-card h1 {
    font-size: 2.4rem;
    margin-bottom: 0.75rem;
    letter-spacing: -0.03em;
  }
  .hero-card p {
    font-size: 1rem;
    line-height: 1.75;
    color: rgba(255,255,255,0.92);
    max-width: 620px;
  }
  .hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.85rem;
    margin-top: 1.35rem;
  }
  .hero-actions a {
    background: rgba(255,255,255,0.17);
    color: #fff;
    padding: 0.85rem 1.2rem;
    border-radius: 999px;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 700;
    transition: transform 0.2s ease, background 0.2s ease;
  }
  .hero-actions a:hover {
    background: rgba(255,255,255,0.26);
    transform: translateY(-2px);
  }
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1rem;
  }
  .stat-card {
    background: #fff;
    border-radius: 20px;
    padding: 1.6rem;
    box-shadow: 0 14px 35px rgba(3,59,159,0.08);
  }
  .stat-card .label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 0.9rem;
  }
  .stat-card .value {
    font-size: 2.5rem;
    font-weight: 800;
    color: #0b4bb8;
    line-height: 1;
  }
  .stat-card .hint {
    margin-top: 0.75rem;
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
  }
  .section-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  .section-head h2 {
    font-size: 1.45rem;
    color: #0f172a;
  }
  .section-head a {
    text-decoration: none;
    color: #0b4bb8;
    font-weight: 700;
  }
  .card-grid {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 1rem;
  }
  .card-panel {
    background: #fff;
    border-radius: 22px;
    padding: 1.4rem;
    box-shadow: 0 12px 30px rgba(3,59,159,0.06);
  }
  .card-panel h3 {
    font-size: 1rem;
    margin-bottom: 0.9rem;
    color: #0b4bb8;
  }
  .card-panel p {
    color: #475569;
    line-height: 1.75;
    margin-bottom: 1.2rem;
  }
  .action-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 0.85rem;
  }
  .btn-action {
    border-radius: 999px;
    padding: 0.95rem 1.25rem;
    border: none;
    text-decoration: none;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s ease, opacity 0.2s ease;
  }
  .btn-action.primary {
    background: #0b4bb8;
    color: #fff;
  }
  .btn-action.secondary {
    background: #f8fafc;
    color: #0f172a;
    border: 1px solid #e2e8f0;
  }
  .btn-action:hover {
    transform: translateY(-1px);
  }
  .table-simple {
    width: 100%;
    border-collapse: collapse;
    min-width: 0;
  }
  .table-simple th,
  .table-simple td {
    padding: 1rem 1rem;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
    white-space: normal;
    word-break: break-word;
  }
  .table-simple th {
    font-size: 0.8rem;
    text-transform: uppercase;
    color: #64748b;
    letter-spacing: 0.08em;
  }
  .table-simple td {
    color: #334155;
    font-size: 0.95rem;
  }
  .badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.35rem 0.8rem;
    border-radius: 999px;
    background: #eff6ff;
    color: #0b4bb8;
    font-size: 0.8rem;
    font-weight: 700;
  }
  @media (max-width: 980px) {
    .hero-card {
      grid-template-columns: 1fr;
      text-align: left;
    }
    .hero-actions {
      justify-content: flex-start;
    }
    .stats-grid {
      grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    .card-grid {
      grid-template-columns: 1fr;
    }
  }
  @media (max-width: 640px) {
    .dashboard-shell {
      padding: 1.5rem 1rem;
    }
    .hero-card {
      gap: 1rem;
      padding: 1.5rem;
      grid-template-columns: 1fr;
    }
    .hero-card h1 {
      font-size: 2rem;
    }
    .hero-card p {
      font-size: 0.95rem;
      max-width: 100%;
    }
    .hero-actions {
      flex-direction: column;
      align-items: stretch;
    }
    .hero-actions a {
      width: 100%;
      justify-content: center;
    }
    .section-head {
      flex-direction: column;
      align-items: flex-start;
      gap: 0.75rem;
    }
    .card-grid {
      grid-template-columns: 1fr;
    }
    .stats-grid {
      grid-template-columns: 1fr;
    }
    .action-buttons {
      flex-direction: column;
      align-items: stretch;
    }
    .table-simple th,
    .table-simple td {
      padding: 0.85rem;
      font-size: 0.9rem;
    }
    .card-panel {
      padding: 1.2rem;
    }
  }
</style>

<div class="dashboard-shell">
  <section class="hero-card">
    <div>
      <span class="badge-pill">Bienvenido</span>
      <h1>Tu espacio de citas médicas</h1>
      <p>Hola, {{userName}}. Aquí puedes ver los médicos disponibles, organizar tu próxima cita y acceder a tu información de paciente de forma rápida y ordenada.</p>
      <div class="hero-actions">
        <a href="index.php?page=MedicosController&action=index">Ver médicos disponibles</a>
        <a href="index.php?page=CitasController&action=agendar">Agendar cita</a>
        {{if canManagePacientes}}
        <a href="index.php?page=PacientesController&action=index">Mis pacientes</a>
        {{endif canManagePacientes}}
        <a href="index.php?page=Security_Perfil">Mi perfil</a>
      </div>
    </div>
    <div style="display:grid;place-items:center;">
      <div style="width:100%;max-width:340px;background:rgba(255,255,255,0.12);border-radius:20px;padding:1.6rem;text-align:center;">
        <div style="font-size:4rem;line-height:1;">👩‍⚕️</div>
        <p style="margin-top:1rem;color:rgba(255,255,255,0.92);font-size:1rem;line-height:1.6;">Explora médicos disponibles o comienza a registrar tú próxima consulta.</p>
      </div>
    </div>
  </section>

  <div class="stats-grid">
    <div class="stat-card">
      <span class="label">Pacientes registrados</span>
      <div class="value">{{total_pacientes}}</div>
      <div class="hint">Número de pacientes activos en el sistema.</div>
    </div>
    <div class="stat-card">
      <span class="label">Médicos disponibles</span>
      <div class="value">{{total_medicos}}</div>
      <div class="hint">Profesionales listos para atender citas.</div>
    </div>
    <div class="stat-card">
      <span class="label">Citas agendadas</span>
      <div class="value">{{total_citas}}</div>
      <div class="hint">Número total de citas en el sistema.</div>
    </div>
  </div>

  <div class="card-grid">
    <div class="card-panel">
      <div class="section-head">
        <h2>Agenda una cita</h2>
        <a href="index.php?page=MedicosController&action=index">Explorar médicos</a>
      </div>
      {{if canSchedule}}
      <p>Elige un doctor de la lista de médicos disponibles y selecciona una fecha y hora que se adapte a tu calendario. El sistema verificará que el horario esté disponible.</p>
      {{else}}
      <p>Administra médicos, pacientes y citas con seguridad. Desde aquí puedes registrar nuevos pacientes y ver el historial de citas del sistema.</p>
      {{endif canSchedule}}
      <div class="action-buttons">
        {{if canSchedule}}
        <a href="index.php?page=CitasController&action=agendar" class="btn-action primary">Agendar cita</a>
        {{endif canSchedule}}
        {{if canManagePacientes}}
        <a href="index.php?page=PacientesController&action=create" class="btn-action primary">Registrar paciente</a>
        {{endif canManagePacientes}}
        <a href="index.php?page=MedicosController&action=index" class="btn-action secondary">Ver médicos</a>
      </div>
    </div>

    <div class="card-panel">
      <div class="section-head">
        <h2>Últimos médicos</h2>
        <a href="index.php?page=MedicosController&action=index">Todos los médicos</a>
      </div>
      {{if medicos}}
      <div class="table-responsive">
      <table class="table-simple">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
          </tr>
        </thead>
        <tbody>
          {{foreach medicos}}
          <tr>
            <td>{{nombres}} {{apellidos}}</td>
            <td>{{nombre_especialidad}}</td>
            <td>{{telefono}}</td>
          </tr>
          {{endfor medicos}}
        </tbody>
      </table>
      </div>
      {{endif medicos}}
      {{ifnot medicos}}
      <p>No hay médicos registrados aún.</p>
      {{endifnot medicos}}
    </div>
  </div>

  <section class="card-panel">
    <div class="section-head">
      <h2>Próximas citas</h2>
      <a href="index.php?page=CitasController&action=index">Ver todas</a>
    </div>
    {{if citas}}
    <div class="table-responsive">
    <table class="table-simple">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Paciente</th>
          <th>Médico</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        {{foreach citas}}
        <tr>
          <td>{{fecha_hora}}</td>
          <td>{{paciente_nombres}} {{paciente_apellidos}}</td>
          <td>{{medico_nombres}} {{medico_apellidos}}</td>
          <td><span class="badge-pill">{{nombre_estado}}</span></td>
        </tr>
        {{endfor citas}}
      </tbody>
    </table>
    </div>
    {{endif citas}}
    {{ifnot citas}}
    <p>No hay citas próximas registradas.</p>
    {{endifnot citas}}
  </section>

  <section class="card-panel">
    <div class="section-head">
      <h2>Pacientes recientes</h2>
      <a href="index.php?page=PacientesController&action=index">Ver todos</a>
    </div>
    {{if pacientes}}
    <div class="table-responsive">
      <table class="table-simple">
        <thead>
          <tr>
            <th>Paciente</th>
            <th>Identidad</th>
            <th>Teléfono</th>
          </tr>
        </thead>
        <tbody>
          {{foreach pacientes}}
          <tr>
            <td>{{nombres}} {{apellidos}}</td>
            <td>{{identidad}}</td>
            <td>{{telefono}}</td>
          </tr>
          {{endfor pacientes}}
        </tbody>
      </table>
    </div>
    {{endif pacientes}}
    {{ifnot pacientes}}
    <p>No hay pacientes registrados aún.</p>
    {{endifnot pacientes}}
  </section>
</div>
