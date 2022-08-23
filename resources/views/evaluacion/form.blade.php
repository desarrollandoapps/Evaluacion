<div class="form-floating my-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->codigo }}" readonly>
    <label for="floatingInput">Código</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->titulo }}" readonly>
    <label for="floatingPassword">Título</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->talento }}" readonly>
    <label for="floatingPassword">Talento</label>
</div>

<hr>
<h2>Formulación de la idea</h2>

<div class="row mb-3">
    <div class="col">
        <h4>Rúbica</h4>
        <ul class="list-group">
            <li class="list-group-item">(1-2)  No es clara, ni concisa</li>
            <li class="list-group-item">(3-4)  No es clara</li>
            <li class="list-group-item">(5-7) Es suficientemente clara</li>
            <li class="list-group-item">(8-10) Es totalmente clara</li>
        </ul>
    </div>
    <div class="col">
        <h4>&nbsp;</h4>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="criterio1" required @if($modo == "Ver") disabled @endif required>
                <option selected value="" disabled>Seleccione...</option>
                <option  value=1 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 1) selected @endif>(1)  No es clara, ni concisa</option>
                <option  value=2 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 2) selected @endif>(2)  No es clara, ni concisa</option>
                <option  value=3 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 3) selected @endif>(3)  No es clara</option>
                <option  value=4 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 4) selected @endif>(4)  No es clara</option>
                <option  value=5 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 5) selected @endif>(5) Es suficientemente clara</option>
                <option  value=6 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 6) selected @endif>(6) Es suficientemente clara</option>
                <option  value=7 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 7) selected @endif>(7) Es suficientemente clara</option>
                <option  value=8 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 8) selected @endif>(8) Es totalmente clara</option>
                <option  value=9 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 9) selected @endif>(9) Es totalmente clara</option>
                <option value=10 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 10) selected @endif>(10) Es totalmente clara</option>
            </select>
            <label for="nombre">Descripción clara y concisa del problema, necesidad u oportunidad a atender con la idea</label>
        </div>
    </div>
</div>



<div class="form-floating mb-3">
    <select class="form-select" id="floatingSelect" name="criterio2" required @if($modo == "Ver") disabled @endif required>
        <option selected value="" disabled>Seleccione...</option>
        <option  value=1 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 1) selected @endif>(1)  No es clara, ni concisa</option>
        <option  value=2 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 2) selected @endif>(2)  No es clara, ni concisa</option>
        <option  value=3 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 3) selected @endif>(3)  No es clara</option>
        <option  value=4 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 4) selected @endif>(4)  No es clara</option>
        <option  value=5 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 5) selected @endif>(5) Es suficientemente clara</option>
        <option  value=6 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 6) selected @endif>(6) Es suficientemente clara</option>
        <option  value=7 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 7) selected @endif>(7) Es suficientemente clara</option>
        <option  value=8 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 8) selected @endif>(8) Es totalmente clara</option>
        <option  value=9 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 9) selected @endif>(9) Es totalmente clara</option>
        <option value=10 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 10) selected @endif>(10) Es totalmente clara</option>
    </select>
    <label for="nombre">Suficiente conocimiento sobre otros resultados que dan solución al problema, necesidad u oportunidad</label>
</div>

<input type="submit" class="btn btn-primary" value="Evaluar">
