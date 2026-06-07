<style>
  .dash { max-width: 1100px; padding-bottom: 3rem; }

  /* ── KPIs ── */
  .kpi-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
  }
  .kpi-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 1.4rem 1.6rem;
    box-shadow: 0 1px 4px rgba(3,59,159,.07);
  }
  .kpi-label {
    font-size: .75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: #64748b;
    margin-bottom: .5rem;
  }
  .kpi-value {
    font-size: 2.4rem;
    font-weight: 800;
    color: #033b9f;
    line-height: 1;
  }
  .kpi-sub {
    font-size: .8rem;
    color: #94a3b8;
    margin-top: .35rem;
  }

  /* ── Grid 2 col ── */
  .dash-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
  }

  /* ── Panel ── */
  .panel {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(3,59,159,.07);
  }
  .panel-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .9rem 1.3rem;
    border-bottom: 1px solid #f1f5f9;
  }
  .panel-title {
    font-size: .9rem;
    font-weight: 700;
    color: #033b9f;
  }
  .panel-link {
    font-size: .78rem;
    color: #2979f5;
    text-decoration: none;
    font-weight: 600;
  }
  .panel-link:hover { text-decoration: underline; }

  /* ── Médicos ── */
  .medico-row {
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: .75rem 1.3rem;
    border-bottom: 1px solid #f1f5f9;
  }
  .medico-row:last-child { border-bottom: none; }
  .medico-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: #e8f0fe;
    color: #033b9f;
    font-size: .72rem;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .medico-name { font-size: .85rem; font-weight: 600; color: #1e293b; }
  .medico-esp  { font-size: .75rem; color: #94a3b8; margin-top: .1rem; }

  /* ── Pacientes recientes ── */
  .pac-table { width: 100%; border-collapse: collapse; }
  .pac-table th {
    font-size: .7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .05em;
    color: #64748b;
    padding: .6rem 1.3rem;
    text-align: left;
    background: #f8fafc;
    border-bottom: 1px solid #f1f5f9;
  }
  .pac-table td {
    padding: .75rem 1.3rem;
    font-size: .85rem;
    color: #475569;
    border-bottom: 1px solid #f1f5f9;
  }
  .pac-table tr:last-child td { border-bottom: none; }
  .pac-table tr:hover td { background: #f8fafc; }
  .pac-name { font-weight: 600; color: #1e293b; }

  /* ── Acciones ── */
  .dash-actions {
    display: flex;
    gap: .75rem;
    margin-bottom: 1.75rem;
    flex-wrap: wrap;
  }
  .btn-dash {
    padding: .5rem 1rem;
    border-radius: 9px;
    font-size: .83rem;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid #e5e7eb;
    color: #334155;
    background: #fff;
    transition: background .15s;
  }
  .btn-dash:hover { background: #f1f5f9; }
  .btn-dash.primary {
    background: #033b9f;
    color: #fff;
    border-color: #033b9f;
  }
  .btn-dash.primary:hover { background: #0553c7; }

  /* ── Empty ── */
  .empty-msg { padding: 2rem; text-align: center; color: #94a3b8; font-size: .85rem; }

  @media (max-width: 680px) {
    .kpi-row  { grid-template-columns: 1fr 1fr; }
    .dash-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="dash">

  <!-- Encabezado -->
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.75rem;">
    <div>
      <h2 style="font-size:1.6rem; font-weight:800; color:#033b9f; letter-spacing:-.02em;">Panel de control</h2>
      <p style="font-size:.85rem; color:#94a3b8; margin-top:.2rem;">{{fecha_hoy}} &nbsp;·&nbsp; Hola, {{userName}}</p>
    </div>
    <div class="dash-actions" style="margin:0;">
      <a href="index.php?page=PacientesController&action=create" class="btn-dash primary">+ Paciente</a>
      <a href="index.php?page=MedicosController&action=create"   class="btn-dash">+ Médico</a>
    </div>
  </div>

  <!-- KPIs -->
  <div class="kpi-row">
    <div class="kpi-card">
      <div class="kpi-label">Pacientes</div>
      <div class="kpi-value">{{total_pacientes}}</div>
      <div class="kpi-sub">registrados en el sistema</div>
    </div>
    <div class="kpi-card">
      <div class="kpi-label">Médicos</div>
      <div class="kpi-value">{{total_medicos}}</div>
      <div class="kpi-sub">en el directorio</div>
    </div>
    <div class="kpi-card">
      <div class="kpi-label">Citas hoy</div>
      <div class="kpi-value" style="color:#f59e0b;">—</div>
      <div class="kpi-sub">módulo próximamente</div>
    </div>
  </div>

  <!-- Grid: médicos + pacientes recientes -->
  <div class="dash-grid">

    <!-- Médicos -->
    <div class="panel">
      <div class="panel-head">
        <span class="panel-title">Médicos disponibles</span>
        <a href="index.php?page=MedicosController" class="panel-link">Ver todos →</a>
      </div>
      {{if medicos}}
        {{foreach medicos}}
        <div class="medico-row">
          <div class="medico-avatar">Dr</div>
          <div>
            <div class="medico-name">{{nombres}} {{apellidos}}</div>
            <div class="medico-esp">{{nombre_especialidad}}</div>
          </div>
        </div>
        {{endfor medicos}}
      {{endif medicos}}
      {{ifnot medicos}}
        <div class="empty-msg">No hay médicos registrados</div>
      {{endifnot medicos}}
    </div>

    <!-- Pacientes recientes -->
    <div class="panel">
      <div class="panel-head">
        <span class="panel-title">Pacientes recientes</span>
        <a href="index.php?page=PacientesController" class="panel-link">Ver todos →</a>
      </div>
      {{if pacientes}}
        <table class="pac-table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Identidad</th>
              <th>Teléfono</th>
            </tr>
          </thead>
          <tbody>
            {{foreach pacientes}}
            <tr>
              <td><span class="pac-name">{{nombres}} {{apellidos}}</span></td>
              <td>{{identidad}}</td>
              <td>{{telefono}}</td>
            </tr>
            {{endfor pacientes}}
          </tbody>
        </table>
      {{endif pacientes}}
      {{ifnot pacientes}}
        <div class="empty-msg">No hay pacientes registrados</div>
      {{endifnot pacientes}}
    </div>

  </div>

</div>
