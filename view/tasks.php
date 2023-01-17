<h3>Список задач пользователя <b><?= $username; ?></b></h3>

<form method="POST" action="/?controller=tasks" class="form-addtask">
    <h4>Добавить новую задачу.</h4>
    <div class="form-group">
        <label for="task">Название задачи</label>
        <input type="text" class="form-control" name="taskName" id="task">
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Добавить задачу</button>
</form>

<?php if ($countTasks) : ?>
    <a class="btn btn-sm btn-danger" href="/?controller=tasks&gettasks=undone">
        Показать только не выполненные
    </a> |
    <a class="btn btn-sm btn-success" href="/?controller=tasks&gettasks=done">
        Показать только выполненные
    </a> |
    <a class="btn btn-sm btn-primary" href="/?controller=tasks">
        Все
    </a>
    <hr>
    <?php foreach ($tasksList as $id => $task) : ?>
        <div class="task-item <?= $task->getIsDone() ? 'task-item__ok' : '' ?>">
            <div class="task-item__date"><?= $task->getDateCreate(); ?></div>
            <div class="task-item__info">
                <div style="flex-grow: 1">
                    <?= $task->getDescription() ?>
                </div>
                <div class="<?= $task->getIsDone() ? 'hidden' : '' ?>">
                    <a href="/?controller=tasks&taskaction=del&taskid=<?= $task->getTaskId(); ?>" class="btn btn-sm btn-danger">
                        Удалить
                    </a>
                    <a href="/?controller=tasks&taskaction=ok&taskid=<?= $task->getTaskId(); ?>" class="btn btn-sm btn-success">
                        Пометить как выполнено
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="alert alert-primary">
        <?= $username ?>, Ваш список задачь пуст!
    </div>
<?php endif; ?>

<style>
    .hidden {
        display: none;
    }

    .task-item {
        padding: 4px 8px;
        border: 1px solid lightgray;
        margin-bottom: 5px;
        border-radius: 8px;
        background: lightpink
    }

    .task-item__ok {
        background: lightgreen;
    }

    .task-item__date {
        color: grey;
        font-size: .8em;
    }

    .task-item__info {
        display: flex;
    }

    .form-addtask {
        padding: 7px;
        border: 1px solid grey;
        border-radius: 6px;
        margin-bottom: 10px;
    }
</style>