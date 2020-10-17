<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estado $estado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estados view content">
            <h3><?= h($estado->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($estado->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Table') ?></th>
                    <td><?= h($estado->table) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estado->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Actividades') ?></h4>
                <?php if (!empty($estado->actividades)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Fecha Registro') ?></th>
                            <th><?= __('Actividades Tipo Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Trabajador Id') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->actividades as $actividades) : ?>
                        <tr>
                            <td><?= h($actividades->id) ?></td>
                            <td><?= h($actividades->descripcion) ?></td>
                            <td><?= h($actividades->fecha_registro) ?></td>
                            <td><?= h($actividades->actividades_tipo_id) ?></td>
                            <td><?= h($actividades->user_id) ?></td>
                            <td><?= h($actividades->trabajador_id) ?></td>
                            <td><?= h($actividades->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Actividades', 'action' => 'view', $actividades->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Actividades', 'action' => 'edit', $actividades->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actividades', 'action' => 'delete', $actividades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividades->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Actividades Tipos') ?></h4>
                <?php if (!empty($estado->actividades_tipos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->actividades_tipos as $actividadesTipos) : ?>
                        <tr>
                            <td><?= h($actividadesTipos->id) ?></td>
                            <td><?= h($actividadesTipos->descripcion) ?></td>
                            <td><?= h($actividadesTipos->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ActividadesTipos', 'action' => 'view', $actividadesTipos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ActividadesTipos', 'action' => 'edit', $actividadesTipos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ActividadesTipos', 'action' => 'delete', $actividadesTipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesTipos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Intersecciones') ?></h4>
                <?php if (!empty($estado->intersecciones)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Longitud') ?></th>
                            <th><?= __('Latitud') ?></th>
                            <th><?= __('Codigo') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->intersecciones as $intersecciones) : ?>
                        <tr>
                            <td><?= h($intersecciones->id) ?></td>
                            <td><?= h($intersecciones->descripcion) ?></td>
                            <td><?= h($intersecciones->longitud) ?></td>
                            <td><?= h($intersecciones->latitud) ?></td>
                            <td><?= h($intersecciones->codigo) ?></td>
                            <td><?= h($intersecciones->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Intersecciones', 'action' => 'view', $intersecciones->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Intersecciones', 'action' => 'edit', $intersecciones->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Intersecciones', 'action' => 'delete', $intersecciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $intersecciones->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tareas') ?></h4>
                <?php if (!empty($estado->tareas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Dificultad') ?></th>
                            <th><?= __('Prioridad') ?></th>
                            <th><?= __('Fecha Registro') ?></th>
                            <th><?= __('Fecha Programada') ?></th>
                            <th><?= __('Fecha Realizada') ?></th>
                            <th><?= __('Actividad Id') ?></th>
                            <th><?= __('Trabajo Id') ?></th>
                            <th><?= __('Interseccion Id') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->tareas as $tareas) : ?>
                        <tr>
                            <td><?= h($tareas->id) ?></td>
                            <td><?= h($tareas->descripcion) ?></td>
                            <td><?= h($tareas->dificultad) ?></td>
                            <td><?= h($tareas->prioridad) ?></td>
                            <td><?= h($tareas->fecha_registro) ?></td>
                            <td><?= h($tareas->fecha_programada) ?></td>
                            <td><?= h($tareas->fecha_realizada) ?></td>
                            <td><?= h($tareas->actividad_id) ?></td>
                            <td><?= h($tareas->trabajo_id) ?></td>
                            <td><?= h($tareas->interseccion_id) ?></td>
                            <td><?= h($tareas->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tareas', 'action' => 'view', $tareas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tareas', 'action' => 'edit', $tareas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tareas', 'action' => 'delete', $tareas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tareas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Trabajadores') ?></h4>
                <?php if (!empty($estado->trabajadores)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombres') ?></th>
                            <th><?= __('Apellido Paterno') ?></th>
                            <th><?= __('Apellido Materno') ?></th>
                            <th><?= __('Dni') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->trabajadores as $trabajadores) : ?>
                        <tr>
                            <td><?= h($trabajadores->id) ?></td>
                            <td><?= h($trabajadores->nombres) ?></td>
                            <td><?= h($trabajadores->apellido_paterno) ?></td>
                            <td><?= h($trabajadores->apellido_materno) ?></td>
                            <td><?= h($trabajadores->dni) ?></td>
                            <td><?= h($trabajadores->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trabajadores', 'action' => 'view', $trabajadores->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trabajadores', 'action' => 'edit', $trabajadores->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trabajadores', 'action' => 'delete', $trabajadores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadores->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Trabajos') ?></h4>
                <?php if (!empty($estado->trabajos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fecha Registro') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->trabajos as $trabajos) : ?>
                        <tr>
                            <td><?= h($trabajos->id) ?></td>
                            <td><?= h($trabajos->fecha_registro) ?></td>
                            <td><?= h($trabajos->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trabajos', 'action' => 'view', $trabajos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trabajos', 'action' => 'edit', $trabajos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trabajos', 'action' => 'delete', $trabajos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($estado->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Trabajador Id') ?></th>
                            <th><?= __('Estado Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estado->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->trabajador_id) ?></td>
                            <td><?= h($users->estado_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
