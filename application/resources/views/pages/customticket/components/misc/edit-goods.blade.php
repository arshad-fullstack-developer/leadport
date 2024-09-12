    @php 
    $totalQty = 0;
    $totalKgcalc = 0;
    $totalLdm = 0;
    $totalVolumeM3 = 0;
    @endphp;    
    <i class="mdi mdi-plus-circle-outline text-success font-28 addgoods"></i>
    <table class="table" id="table">
        <thead>
        <tr>
		<th>Quantity</th>
        <th>Units</th>
        <th>Description</th>
        <th>Weight (Br)</th>
		<th>LDM</th>
		<th>Volume (m3)</th>
		<th>Length (cm)</th>
		<th>Width (cm)</th>
		<th>Height (cm)</th>
		</tr>
        </thead>
        <tbody id="goodsTable">
        @foreach($ticket['goods'] as $key => $good) 

            @php 
            $totalQty += $good['qty'];
            $totalKgcalc += $good['kgcalc'];
            $totalLdm += $good['ldm'];
            $totalVolumeM3 += $good['volumem3'];
            @endphp;
            <tr id="{{$key}}">
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][qty]"          value="{{  $good['qty']}}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][unitid]"       value="{{  $good['unitid'] }}"></td>
                <td><input type="text"   class="form-control"  id="{{$key}}"   name="goods[{{$key}}][description]"  value="{{  $good['description'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][kgcalc]"       value="{{  $good['kgcalc'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][ldm]"          value="{{  $good['ldm'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][volumem3]"     value="{{  $good['volumem3'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][lengthcm]"     value="{{  $good['lengthcm'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][widthcm]"      value="{{  $good['widthcm'] }}"></td>
                <td><input type="number" class="form-control"  id="{{$key}}"   name="goods[{{$key}}][heightcm]"     value="{{  $good['heightcm'] }}"></td>
                <td><button type="button" class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm"  onclick="removeIndex(this)"><i class="sl-icon-trash"></i></button></td>
            </tr>
            @endforeach
         </tbody>
         <tr>
		        <td><input type="number" class="form-control" value="{{ $totalQty }}" disabled></td>
				<td></td>
				<td></td>
	            <td><input type="number" class="form-control" value="{{ $totalKgcalc }}" disabled></td>
				<td><input type="number" class="form-control" value="{{ $totalLdm }}" disabled></td>
				<td><input type="number" class="form-control" value="{{ $totalVolumeM3 }}" disabled></td>
				<td></td>
				<td></td>
                <td></td>
			    <td></td>
		</tr>
    </table> 