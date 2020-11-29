<button data-link="{{ route('expense.show', $expense->id) }}" class="btn btn-info btn-sm upsert">
    <i class='fas fa-eye'></i>
    View
</button>
<button data-link="{{ route('expense.edit', $expense->id) }}" class="btn btn-primary btn-sm upsert">
    <i class='fas fa-edit'></i>
    Edit
</button>
<button data-link="{{ route('expense.destroy', $expense->id) }}" class="btn btn-danger btn-sm delete">
    <i class='fas fa-trash-alt'></i>
    Trash
</button>
