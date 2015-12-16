
<h2 style="text-align: center">Imprime tus localidades</h2>
<form method="post" action="generar" />
<table align="center">
    <tr>
        <td>
            <select name="provincia" id="provincia">
		    <option value="">Selecciona tu provincía</option>
		    <?php
		    foreach($provincias as $fila)
		    {
		    ?>
		    <option value=<?=$fila['matricula']?>><?=$fila['matricula']?></option>
		    <?php
			}
		    ?>
    		</select>
        </td>
    </tr>
    <tr>
	    <td align="center" colspan="7">
	    <hr />
	        <input type="submit" value="Crear PDF" title="Crear PDF" />
        </td>
    </tr>
</table>
</form>
</body>
</html>