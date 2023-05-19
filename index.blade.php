@foreach ($items as $item)
     <tr>
         <td>{{ $item->name }}</td>
         <td>{{ $item->item_id }}</td>
         <td>{{ $item->path }}</td>
        
     </tr>
     @endforeach