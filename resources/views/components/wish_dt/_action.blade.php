<a href="{{ route('wish_list.show', $wish->id) }}" class="btn btn-info btn-sm">
    <i class='fas fa-eye'></i>
    View
</a>
<a href="{{ route('wish_list.edit', $wish->id) }}" class="btn btn-primary btn-sm">
    <i class='fas fa-edit'></i>
    Edit
</a>
<button type='button' data-link="{{ route('wish_list.destroy', $wish->id) }}" class="btn btn-danger btn-sm delete">
    <i class='fas fa-trash-alt'></i>
    Trash
</button>
