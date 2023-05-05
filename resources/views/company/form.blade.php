Formulario que tendra los datos en comun con create y edit
<label for="identifier_key">Identificador</label>
<input type="text" name="identifier_key" value="{{ $company->identifier_key}}" id="identifier_key">
<br>

<label for="description">Descripción</label>
<input type="text" name="description" value="{{ $company->description }}" id="description">
<br>

<label for="image_path">Imagen del Establecimiento</label>
<input type="file" name="image_path" value="{{ $company->image_path }}" id="image_path">
<br>

<label for="kind_company">Tipo de Empresa</label>
<input type="text" name="kind_company" value="{{ $company->kind_company }}" id="kind_company">
<br>

<label for="brand_id">Marca de la Empresa</label>
<input type="text" name="brand_id" value="{{ $company->brand_id }}" id="brand_id">
<br>

<label for="geographic_detail_id">Detalles Geograficos</label>
<input type="text" name="geographic_detail_id" value="{{ $company->geographic_detail_id }}"
    id="geographic_detail_id">
<br>

<input type="submit" value="Ingresar">
<br>