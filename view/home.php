<?php
/*
  se realiza carga de contenido mediante la dinamica de master page siendo index por la estrcutura mi master page
  y home una de mis paginas hijas para mostar el contenido procesado en mi programa.
 */
?>
<form name="prueba"  id="prueba" method="post" action="/view/home2.php">
    <input type="hidden" name="paso" id="paso" value="paso1" />
    <input type="hidden" value="" name="sesion" id="sesion" />
    <input type="submit" value="Consultar" name="ejecuta" id="ejecuta" disabled="true" />
</form>
<div class="reporte">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>contact no</th>
                <th>lastname</th>
                <th>createdtime</th>
            </tr>
        </thead>
        <tbody id="contenTabla">
        </tbody>
    </table>
</div>
