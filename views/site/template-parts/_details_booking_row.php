<tr>
  <td><?= $index ?></td>
  <td><?= $model->booking_id ?></td>
  <td><?= $model->start_date ?></td>
  <td><?= $model->end_date ?></td>
  <td><?= $model->getBusyDaysWithinRentalPeriod(new DateTime($model->start_date), new DateTime($model->end_date)) ?> d</td>
  <td><?= $model->source ?></td>
  <td><?= $model->status ?></td>
</tr>