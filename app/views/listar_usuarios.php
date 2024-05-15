<?php $this->layout('template', ['title' => $title]) ?>


<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            
            <!-- <a href="/sair" class="btn btn-outline-danger">sair</a> -->
        </div>
    </nav>

    <br>

    <h1 class="text-center"> Bem Vindo <?=$_SESSION['nome']?> </h1>

    <div class="m-5">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col" style="width: 10%;">Date of birth</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Adress</th>
                    <th scope="col" style="width: 6%;">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($aUsuarios as $user){ 

                    $valida = ($user['id'] === $userAtual[0]['id']) ? "" : "disabled";
                ?>
                        <tr>
                            <td> <?=$user['id']?> </td>
                            <td> <?=$user['nome']?> </td>
                            <td> <?=$user['email']?> </td>
                            <td> <?=$user['telefone']?> </td>
                            <td style="width: 10%;"> <?=$user['data_nasc']?> </td>
                            <td> <?=$user['cidade']?> </td>
                            <td> <?=$user['estado']?> </td>
                            <td> <?=$user['endereco']?> </td>
                            


                            <td style="width: 6%;">	
                                <button class='btn btn-sm btn-primary' <?=$valida?>>
                                <a href="edit.php?id=<?=$user['id']?>"><i style="color: white;" class="bi bi-pencil"></i></a>
                                </button>
                                <button class='btn btn-sm btn-danger' <?=$valida?>>
                                    <a href="delete.php?id=<?=$user['id']?>"><i style="color: white;" class="bi bi-trash"></i></a>
                                </button>
                            </td>

                        </tr>
                <?php } ?>
            </tbody>

        </table>

        <!-- <button disabled class="btn btn-danger" onclick="imprimir()">imprimir pdf</button>
        <button disabled class="btn btn-success" onclick="window.location.href = 'sistema_excel.php'">gerar excel</button> -->
    </div>
</body>

</body>

