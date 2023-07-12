<div class="row">
    <div class="col-xl-3 col-md-6 ">
      <div class="widget widget-stats bg-teal">
        <div class="stats-icon stats-icon-lg">
          <i class="fas fa-users fa-fw"></i>
        </div>
        <div class="stats-content">
          <div class="stats-title">PACIENTES REGISTRADOS HOY</div>
          <div class="stats-number m-b-2" id="home_total_online">{{$pacientes["hoy"]}}</div>
          <div>Total Registrados <b id="home_total_registrados">{{$pacientes["totales"]}}</b>
          </div>
          <div class="stats-progress progress">
            <div class="progress-bar bar-w-1" style="width: {{round($pacientes['hoy']/($pacientes['totales']+1),2)*100}}%;"></div>
          </div>
          <div class="stats-desc">
            <a href="{{route("administrator.pacientes")}}">Lista de pacientes <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 ">
      <div class="widget widget-stats bg-blue">
        <div class="stats-icon stats-icon-lg">
          <i class="fas fa-tags fa-fw"></i>
        </div>
        <div class="stats-content">
          <div class="stats-title">FACTURADO HOY</div>
          <div class="stats-number m-b-2" id="home_pagos_hoy">{{$clinica["moneda"]}} {{$facturado["hoy"]}}</div>
          <div>Cobrado este mes <b id="home_pagos_mes">{{$clinica["moneda"]}} {{$facturado["totales"]}}</b>
          </div>
          <div class="stats-progress progress">
            <div class="progress-bar bar-w-2" style="width: {{round($facturado['hoy']/($facturado['totales']+1),2)*100}}%;"></div>
          </div>
          <div class="stats-desc">
            <a href="#ajax/transacciones">Ver transacciones <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 ">
      <div class="widget widget-stats bg-indigo">
        <div class="stats-icon stats-icon-lg">
          <i class="far fa-file-alt fa-fw"></i>
        </div>
        <div class="stats-content">
          <div class="stats-title">FACTURAS NO PAGADAS</div>
          <div class="stats-number  m-b-2" id="home_facturas_nopagadas">{{$facturas["totales"]}}</div>
          <div>Total vencidas <b id="home_facturas_vencidas">{{$facturas["vencidas"]}}</b>
          </div>
          <div class="stats-progress progress">
            <div class="progress-bar bar-w-3" style="width: {{round($facturas['vencidas']/($facturas['totales']+1),2)*100}}%;"></div>
          </div>
          <div class="stats-desc">
            <a href="#ajax/facturas">Ver Facturas <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 ">
      <div class="widget widget-stats bg-dark">
        <div class="stats-icon stats-icon-lg">
          <i class="far fa-comments fa-fw"></i>
        </div>
        <div class="stats-content">
          <div class="stats-title">MENSAJES RECIBIDOS</div>
          <div class="stats-number m-b-2" id="home_soporte_activo">0</div>
          <div>Total Sin Respuesta <b id="home_soporte_abierto">0</b>
          </div>
          <div class="stats-progress progress">
            <div class="progress-bar bar-w-4" style="width: 0%;"></div>
          </div>
          <div class="stats-desc">
            <a href="#ajax/soporte?action=open">Ver Mensajes <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>