

<form <?php print html_attr($form['attr'] ?? []) + ['method'=> 'POST']); ?>>

    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

    <?php endforeach; ?>

    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>

    <?php endforeach; ?>
</form>

