    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuários</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Todos os Usuários</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  <span onclick="location.href='/usuarios/criar';" class=" right badge badge-success" style="cursor:pointer;"><i class="fas fa-user-plus"></i></span>

                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Tipo</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?php echo $user->user_id;?></td>
                      <td><?php echo $user->name." ".$user->last_name;?></td>
                      <td><?php echo $user->email;?></td>
                      <td><?php echo ($user->user_type == 0) ? "Comum": "Admin" ;?></td>
                      <td>
                        <span data-id= "<?php echo $user->user_id;?>" class="dell-button right badge badge-danger" style="cursor:pointer;"><i class="fas fa-trash-alt"></i></span>
                        <span onclick="location.href='/usuarios/<?php echo $user->user_id;?>';" class="btn right badge badge-warning"style="cursor:pointer;" ><i class="fas fa-pencil-alt"></i></span>
                    
                    </td>
                    </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">

                        $(".dell-button").click(function(){

                            $.get("/usuarios/deletar/"+$(this).data("id"), function(data, status){

                                if(data ==1){
                                 location.reload();

                                }else {alert("Não foi possivel excluir o usuário.");
                                }

                            });


                        });


    </script>