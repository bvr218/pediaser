<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pediaser</title>
    <link rel="icon" href="{{asset('images/logo-r.png')}}" />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
      rel="stylesheet"
    />
  </head>
  <body>
     <!-- HEADER -->
     <div>
      <header>
        <div
          class="d-flex navbar justify-content-center border-bottom position-fixed w-100"
          style="z-index: 1000"
        >
          <div style="flex: 1">
            <img
              src="{{asset('images/logo-r.png')}}"
              alt="Logo pediaser clínica"
              width="80px"
            />
          </div>
          <div class="content_nav-pc">
            <nav class="nav_pc">
              <ul class="d-flex m-0 list-unstyled">
                <li class="mx-2">
                  <a href="/">Inicio</a>
                </li>
                <li class="mx-2">
                  <a href="#informacion">Información</a>
                </li>
                <li class="mx-2">
                  <a href="#servicios">Servicios</a>
                </li>
                <li class="mx-2">
                  <a href="#equipo">Equipo médico</a>
                </li>
              </ul>
            </nav>

          </div>

          <!-- Menu desplegable  -->
          <div class="content_nav-mb">
            <div class="d-flex align-items-center h-100">
              <i
                id="toggle_open"
                class="bi bi-list d-md-none d-sm-block"
                style="font-size: 30px"
              ></i>
            </div>
            <div>
              
              <nav id="menu" class="nav_mb">
                <div
                  class="d-flex justify-content-center align-items-center gap-2"
                >
                  <p class="m-0" style="font-size: 25px">Menú</p>
                  <i
                    id="toggle_close"
                    class="bi bi-x-circle"
                    style="font-size: 30px; margin-right: 5px"
                  ></i>
                </div>
                <div class="d-flex">
                  <ul class="d-flex flex-column list-unstyled w-100">
                    <li class="">
                      <a href="#">Inicio</a>
                      <i class="bi bi-house"></i>
                    </li>
                    <li class="">
                      <a href="#">Información</a>
                      <i class="bi bi-info-circle"></i>
                    </li>
                    <li class="">
                      <a href="#">Servicios</a>
                      <i class="bi bi-person-bounding-box"></i>
                    </li>
                    <li class="">
                      <a href="#">Equipo médico</a>
                      <i class="bi bi-people"></i>
                    </li>
                    
                  </ul>
                </div>
              </nav>
            </div>
          </div>
          
        </div>
        <div
          class="d-flex flex-column flex-sm-column gap-3 flex-md-row align-items-center"
          style="min-height: 100vh"
        >
          <div
            class="d-flex flex-column justify-content-md-start align-items-center justify-content-sm-center h1 flex-fill"
          >
            <h1
              id="typed"
              class="h1 fw-bold text-center col-white mt-sm-5 col-md-12 col-sm-6"
              style="font-size: 50px"
            ></h1>
          </div>
          <div class="flex-fill">
            <img
              src="{{asset('images/baby.png')}}"
              alt="bebé"
              class="rounded-circle shadow-sm baby-img my-3"
            />
          </div>
        </div>
      </header>
      <!-- Primera sección -->
      <section id="informacion" class="d-flex align-items-center flex-column flex-md-row">
        <div>
          <img class="img_info-company" src="{{asset('images/logo-r.png')}}" alt="Logo pediaser" />
        </div>
        <div>
          <div class="text-center">
            <h2 class="fw-bold">Información de la empresa</h2>
            <p class="px-2 px-md-0">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat
              consequatur quo facilis ipsam tempore labore unde, soluta
              consectetur, adipisci expedita placeat perspiciatis sunt
              consequuntur obcaecati vitae inventore corporis iure cupiditate!
            </p>
          </div>
          <div class="text-center">
            <a href="#section_services">
              <button class="bnt btn-secondary col-6 my-3 my-md-0 py-2">
                Ver más
              </button>
            </a>
          </div>
        </div>
      </section>

      <!-- Segunda sección -->
      <section
        id="servicios"
        class="d-flex align-items-center flex-column justify-content-center"
        style="min-height: 100vh"
      >
        <div>
          <h2 class="text-center fw-bold py-4">Servicios</h2>
        </div>
        <div class="content_services">
          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Atención y tratamiento de enfermedades infantiles comunes
              </h5>
              <p class="card-text">
                Diagnóstico y tratamiento de enfermedades comunes en la
                infancia, como resfriados, fiebre, infecciones del oído, etc.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Diagnóstico y manejo de trastornos del crecimiento y desarrollo
              </h5>
              <p class="card-text">
                Evaluación y tratamiento de trastornos del crecimiento,
                desarrollo físico y desarrollo cognitivo en niños.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Control y tratamiento de enfermedades crónicas pediátricas
              </h5>
              <p class="card-text">
                Manejo de enfermedades crónicas en niños, como diabetes, asma,
                alergias, enfermedades del corazón, etc.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Asesoramiento sobre nutrición y alimentación infantil
              </h5>
              <p class="card-text">
                Brindar orientación sobre una alimentación saludable y adecuada
                para los niños, incluyendo lactancia materna, introducción de
                alimentos sólidos, etc.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Atención y tratamiento de problemas respiratorios, como el asma
              </h5>
              <p class="card-text">
                Evaluación, diagnóstico y manejo de enfermedades respiratorias
                en niños, como el asma y las infecciones respiratorias.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Manejo de enfermedades infecciosas pediátricas
              </h5>
              <p class="card-text">
                Diagnóstico, tratamiento y prevención de enfermedades
                infecciosas en niños, como varicela, influenza, neumonía, etc.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Atención de emergencias y lesiones en niños
              </h5>
              <p class="card-text">
                Brindar atención inmediata a lesiones, accidentes y emergencias
                médicas que involucren a niños.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Seguimiento y monitoreo del desarrollo físico y mental
              </h5>
              <p class="card-text">
                Realizar seguimiento regular del crecimiento físico, desarrollo
                mental y hitos del desarrollo en niños.
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="text-center fw-bold py-4">
                Derivación a especialistas pediátricos en caso necesario
              </h5>
              <p class="card-text">
                Referir a especialistas pediátricos altamente especializados
                para el manejo de condiciones médicas complejas en niños.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Tercera sección -->
      <section id="equipo">
        <div>
          <div>
            <h2 class="text-center fw-bold py-4">Equipo de médico</h2>
          </div>
          <div class="content_cards">
            <div class="card">
              <h3>{Nombre médico}</h3>
              <img class="img_team" src="{{('images/medico-pediatra.jpeg')}}" alt="medico pediatra" />
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos
                inventore ipsa minima. Quaerat at, molestias culpa aspernatur
                vel mollitia pariatur, error officiis sit eum explicabo
                accusamus deserunt inventore! Adipisci, repellat!
              </p>
            </div>
            <div class="card">
              <h3>{Nombre médico}</h3>
              <img class="img_team" src="{{asset('images/medico-pediatra.jpeg')}}" alt="medico pediatra" />
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos
                inventore ipsa minima. Quaerat at, molestias culpa aspernatur
                vel mollitia pariatur, error officiis sit eum explicabo
                accusamus deserunt inventore! Adipisci, repellat!
              </p>
            </div>
            <div class="card">
              <h3>{Nombre médico}</h3>
              <img class="img_team" src="{{asset('images/medico-pediatra.jpeg')}}" alt="medico pediatra" />
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos
                inventore ipsa minima. Quaerat at, molestias culpa aspernatur
                vel mollitia pariatur, error officiis sit eum explicabo
                accusamus deserunt inventore! Adipisci, repellat!
              </p>
            </div>
            <div class="card">
              <h2>{Nombre médico}</h2>
              <img class="img_team" src="{{asset('images/medico-pediatra.jpeg')}}" alt="medico pediatra" />
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos
                inventore ipsa minima. Quaerat at, molestias culpa aspernatur
                vel mollitia pariatur, error officiis sit eum explicabo
                accusamus deserunt inventore! Adipisci, repellat!
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer id="footer">
        <div>
          <h2 class="fw-bold text-center">Pediaser</h2>
          <div
            class="d-flex align-items-center justify-content-center gap-3 pb-3"
          >
            <a href="#">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#">
              <i class="bi bi-instagram"></i>
            </a>
          </div>
        </div>
      </footer>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="{{asset('js/typed.js')}}"></script>
    <script src="{{asset('js/menu.js')}}"></script>
  </body>
</html>
