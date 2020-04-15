<form

    <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

        <label><br> <?php print $field['label']; ?><br></label>
        <?php if (in_array($field['type'], ['text', 'number','email', 'password'])): ?>
            <input <?php
            print html_attr(($field['extra']['attr'] ?? []) +
                [
                    'name' => $field_id,
                    'type' => $field['type'],
                    'value' => $field['value'] ?? '',

                ]); ?>>
        <?php elseif (in_array($field['type'], ['select'])) : ?>
            <select <?php print html_attr(($field['extra']['attr'] ?? []) +
                [
                    'name' => $field_id
                ]); ?>>
                <?php foreach ($field['options'] as $option_id => $option): ?>
                    <option value="<?php print $option_id; ?>"
                        <?php print (($field['value'] ?? '') == $option_id) ? 'selected' : ''; ?>>
                        <?php print $option; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

        <?php if (isset($form['error'])): ?>
            <span style="color:red"><?php print  $form['error']; ?></span>
        <?php endif; ?>

    <?php endforeach; ?>

    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print html_attr(
            ($button['extra']['attr'] ?? []) + ['value' => $button_id, 'name' => 'action']); ?>>
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
    <?php if(isset($form['error'])): ?>
        <span style="color:red"><?php print  $form['error'] ; ?></span>
    <?php endif; ?>
</form>
