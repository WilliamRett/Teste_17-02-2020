@extends('layouts.app')
@section('content')
<div class="container">
<div class="table-responsive">
    <form method="post" id="phone_form">
     <span id="result"></span>
     <table class="table table-bordered table-striped" id="user_table">
   <thead>
    <tr>
        <th width="35%">Telefone</th>
        <th width="30%">Ação</th>
    </tr>
   </thead>
   <tbody id="tbody">
    
   </tbody>
   <tfoot>
    <tr>
    <td colspan="1" align="right">&nbsp;</td>
    <td>
      @csrf
      <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
     </td>
    </tr>
   </tfoot>
</table>
    </form>
</div>
@endsection
<script>
</script>