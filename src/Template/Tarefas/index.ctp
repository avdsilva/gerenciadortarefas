<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tarefa'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tarefas index large-9 medium-8 columns content">
    <h3><?= __('Tarefas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('assunto') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarefas as $tarefa): ?>
            <tr>
                <td><?= $this->Number->format($tarefa->id) ?></td>
                <td><?= h($tarefa->assunto) ?></td>
                <td><?= h($tarefa->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tarefa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tarefa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tarefa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarefa->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
