<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas de Faculdade</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark text-white p-3">
                <h1>Notas de Faculdade</h1>
                <div id="notesList" class="mt-4"></div>
            </div>
            <div class="col-md-9 p-3">
                <div class="note-input">
                    <div class="toolbar">
                        <button onclick="execCmd('bold')"><i class="fas fa-bold"></i></button>
                        <button onclick="execCmd('italic')"><i class="fas fa-italic"></i></button>
                        <button onclick="execCmd('underline')"><i class="fas fa-underline"></i></button>
                        <button onclick="execCmd('justifyLeft')"><i class="fas fa-align-left"></i></button>
                        <button onclick="execCmd('justifyCenter')"><i class="fas fa-align-center"></i></button>
                        <button onclick="execCmd('justifyRight')"><i class="fas fa-align-right"></i></button>
                        <button onclick="execCmd('insertImage', prompt('Enter image URL', ''))"><i class="fas fa-image"></i></button>
                        <input type="color" onchange="execCmd('foreColor', this.value)">
                        <input type="color" onchange="execCmd('hiliteColor', this.value)">
                    </div>
                    <div id="noteText" class="form-control" contenteditable="true" style="height: 200px;"></div>
                    <select id="noteCategory" class="form-control mt-2">
                        <option value="Geral">Geral</option>
                        <option value="Matemática">Matemática</option>
                        <option value="História">História</option>
                        <option value="Ciências">Ciências</option>
                    </select>
                    <button id="saveNote" class="btn btn-primary mt-2 animate__animated">Salvar Nota</button>
                    <button id="savePDF" class="btn btn-secondary mt-2 animate__animated">Salvar como PDF</button>
                </div>
            </div>
        </div>
    </div>
    <div id="notification" class="notification"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
