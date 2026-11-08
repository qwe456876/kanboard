<div class="page-header">
    <h2><?= $this->text->e($title) ?></h2>
</div>

<p>
    <?= t('Open Qwen in another tab, ask it to return JSON, then paste that JSON here.') ?>
</p>

<?php if (! empty($errors)): ?>
    <div class="alert alert-error">
        <?php foreach ($errors as $error): ?>
            <div><?= $this->text->e($error) ?></div>
        <?php endforeach ?>
    </div>
<?php endif ?>

<form method="post" action="<?= $this->url->href('QwenTasks', 'create', array('plugin' => 'QwenTasks')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Project'), 'project_id') ?>
    <?= $this->form->select('project_id', $projects, $values, $errors) ?>

    <?= $this->form->label(t('Qwen JSON'), 'tasks_json') ?>
    <?= $this->form->textarea('tasks_json', $values, $errors, array('required', 'rows="18"', 'spellcheck="false"')) ?>

    <p class="form-help">
        <?= t('Expected format:') ?>
        <code>{"tasks":[{"title":"Prepare release","description":"Checklist for release","tags":["release"]}]}</code>
    </p>

    <?= $this->modal->submitButtons(array('submitLabel' => t('Create tasks'))) ?>
</form>
