<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


class Task
{
    public function __construct(
        public int     $id,
        public string  $title,
        public string  $description,
        public ?string $long_description,
        public bool    $completed,
        public string  $created_at,
        public string  $updated_at
    )
    {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Head to the supermarket to pick up essential items like milk, bread, eggs, fresh fruits, vegetables, and some chicken for dinner. Don\'t forget to check the pantry first to avoid buying duplicates.',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        'Go through your closets and storage to identify items you no longer need or use. This could include old clothes, electronics, books, or furniture. Take clear photos of each item and list them on online marketplaces like Facebook Marketplace or eBay, making sure to include detailed descriptions and pricing.',
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Dedicate at least two hours to studying a new programming concept. This might involve working through online tutorials, practicing coding challenges, or reading documentation on a specific language or framework. Focus on understanding the core principles before moving on to more complex topics.',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        'Leash up both dogs and take them for a refreshing walk around the neighborhood. Aim for at least 30 minutes of activity, exploring different routes to keep them engaged. Remember to bring waste bags and water for them, especially if it\'s a warm day. Consider visiting the park for some off-leash play if time permits.',
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

//A Laravel Collection = a smart array with helper functions
//You’re actually calling Laravel’s global helper function collect(), which returns a new instance of the Illuminate\Support\Collection class
//In Laravel, a Collection is a powerful, object-oriented wrapper around arrays that implements multiple PHP interfaces—like ArrayAccess, Countable, and IteratorAggregate—allowing it to behave like an array while providing expressive, chainable methods such as map(), filter(), and firstWhere() for easier and cleaner data manipulation.

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show', ['task' => $task]);
})->name('tasks.show');
