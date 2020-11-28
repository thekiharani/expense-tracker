<button data-link="{{ route('income.show', $income->id) }}" class="btn btn-info btn-sm upsert">
    <i class='fas fa-eye'></i>
    View
</button>
<button data-link="{{ route('income.edit', $income->id) }}" class="btn btn-primary btn-sm upsert">
    <i class='fas fa-edit'></i>
    Edit
</button>
<button type='button' data-link="{{ route('income.destroy', $income->id) }}" class="btn btn-danger btn-sm delete">
    <i class='fas fa-trash-alt'></i>
    Trash
</button>
