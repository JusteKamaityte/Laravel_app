<form
    <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>
        <label><span><?php print $field['label']; ?></span> </label>
        <?php if (in_array($field['type'], ['text', 'password', 'email', 'number'])): ?>
        <?php var_dump($field); ?>
            <input <?php
            print html_attr(
                ($field['extra']['attr'] ?? []) +
                [
                    'name' => $field_id,
                    'type' => $field['type'],
                    'value' => $field['value'] ?? '',

                ]); ?>>
        <?php elseif (in_array($field['type'], ['select'])): ?>
            <select <?php print html_attr(($form['attr'] ?? [])); ?>>
                <?php foreach ($field['options'] as $option_id => $option): ?>
                    <option value="<?php print $option_id; ?>">
                        <?php print ($field['value'] == $option_id) ? 'selected' : ''; ?>
                        <?php print $option; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php elseif (in_array($field['type'], ['textarea'])) : ?>
            <textarea <?php print html_attr(($field['extra']['attr'] ?? []) +
                [
                    'name' => $field_id,
                ]); ?>>
                <?php print $field['value'] ?? ''; ?>
            </textarea>
        <?php endif; ?>

    <?php endforeach; ?>
    <?php if (isset($field['errors'])): ?>
        <span class="error"><?php print $field['errors']; ?></span>
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print html_attr(
            ($button['extra']['attr'] ?? []) + ['value' => $button_id, 'name' => 'action']); ?>>
        <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
</form>

