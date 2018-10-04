<main>
<div class="createElementos">
    <h1>Adicionar Video-Jogo</h1>

    <form method = "post">   

        <div class="form-row">
            <label for = "videojogo-name"> Titulo Jogo:</label>
            <input required="required" id="idVideoJogo" type="text" name="Titulo" />
        </div>

        <div class="form-row">
            <label>Preço:</label>
            <input required="required" type="number" name="Preco" step="any"/>
        </div>

        <div class="form-row">
            <label>Data Lançamento:</label>
            <input required="required" type="date" name="Data" /> 
        </div>

        <div class="form-row">
            <label>Pontuação:</label>
            <input required="required" type="number" name="Pontuacao" min="1" max="10">
        </div> 
        
        <label>Fabricante: </label>
        <select name="fabricantes">
            <?php
            $res = Fabricante::retrieveAll();
            while ($fabricante = $res->fetch()) {
                echo "<option value='" . $fabricante->idFabricante . "'>" . $fabricante->Fabricante . "</option>";
            }
            ?>
        </select>
        <br/>
        
        <label>Plataforma: </label>
        <select name="plataformas">
            <?php
            $res = Plataforma::retrieveAll();
            while ($plataforma = $res->fetch()) {
                echo "<option value='" . $plataforma->idPlataforma . "'>" . $plataforma->Plataforma . "</option>";
            }
            ?>
        </select>
        <br/>
        <br/>
        
        


        <input type="submit" name="form-videojogo"
               value="Send"/>

    </form>
    
   

    
</div>
</main>