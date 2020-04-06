<form

    <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>
    <h2>Apklausa</h2>
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

        <label><span><?php print $field['label']; ?></span></label>
        <?php if (in_array($field['type'], ['text', 'number', 'password'])): ?>
            <input <?php
            print html_attr(($field['extra']['attr'] ?? []) +
                [
                    'name' => $field_id,
                    'type' => $field['type'],
                    'value' => $field['value'] ?? '',

                ]); ?>>

        <?php elseif (in_array($field['type'], ['radio'])): ?>
        <div class="form_field_select">
        <?php foreach ($field['select'] as $radio_id => $radio_value): ?>
            <label>
                <span><?php print $radio_value?></span>
                <input <?php
                print html_attr(($field['extra']['attr'] ?? []) +
                    [
                        'name' => $field_id,
                        'type' => $field['type'],
                        'value' => $radio_value['value'] ?? ''
                    ]);
                ?>>
            </label>
        <?php endforeach; ?>
        </div>
        <?php if (isset($field['error'])): ?>
            <span class="error"><?php print $field['error']; ?></span>
        <?php endif; ?>


        <?php if (isset($form['error'])): ?>
            <span><?php print  $form['error']; ?></span>
        <?php endif; ?>

    <?php endif; ?>
    <?php endforeach; ?>
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print html_attr(
            ($button['extra']['attr'] ?? []) + ['value' => $button_id, 'name' => 'action']); ?>>
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
</form>
