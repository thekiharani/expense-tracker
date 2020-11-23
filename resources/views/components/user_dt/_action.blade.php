<a href="{{ route('manage.admins.show', $user->id) }}" class="btn btn-info btn-sm">
    <i class='fas fa-eye'></i>
    View
</a>
<a href="{{ route('manage.admins.edit', $user->id) }}" class="btn btn-primary btn-sm">
    <i class='fas fa-edit'></i>
    Edit
</a>
<button type='button' data-link="{{ route('manage.admins.destroy', $user->id) }}" class="btn btn-danger btn-sm delete">
    <i class='fas fa-trash-alt'></i>
    Trash
</button>
