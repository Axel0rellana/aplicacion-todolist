<?php include "agregarTarea.php"; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#b5dff0" />
    <meta name="description" content="Aplicación TODO list" />
    <link rel="icon" href="src/assets/icons/favicon.ico" />
    <link rel="favicon" href="src/assets/icons/favicon.png" />
    <link rel="apple-touch-icon" href="src/assets/icons/apple-touch-icon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
	  <link rel="stylesheet" type="text/css" href="src/styles/index.css" />
    <title>Aplicación TODO list</title>
  </head>
  <body class="select-none bg-light">

    <main class="container mb-4">
      <div class="card">
        <div class="card-header">
          Lista de tareas (TODO LIST)
        </div>

        <div class="card-body">
          <div class="mb-3">
            <form action="" method="post">
              <input class="form-control mb-3" type="text" name="tarea" id="tarea" placeholder="Escriba una tarea" autocomplete="off" required />
              <input class="btn btn-success btn-small" type="submit" value="Agregar Tarea" name="agregar_tarea" id="agregar_tarea" />
            </form>
          </div>

          <ul class="list-group">
            <?php foreach ($registros as $registro) {?>
              <li class="list-group-item">
                <div class="d-flex gap-2 align-items-center">
                  <form action="" method="post">
                    <input
                      type="hidden"
                      name="id"
                      value="<?php echo $registro['id']; ?>"
                    />
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value="<?php echo $registro['completado']; ?>"
                      name="completado"
                      id="completado"
                      onChange="this.form.submit();"
                      <?php echo ($registro['completado']==1) ? 'checked' : ''; ?> 
                    />
                  </form>
                  <span
                    class="<?php echo ($registro['completado']==1) ? 'text-decoration-line-through' : ''; ?>"
                  >
                    <?php echo $registro['tarea']; ?>
                  </span>
                  <a
                    href="?id=<?php echo $registro['id']; ?>"
                  >
                    <span class="badge bg-danger">x</span>
                  </a>
                </div>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>