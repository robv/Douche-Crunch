<h1>Douches List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Submit ip</th>
      <th>Twitter</th>
      <th>Twitter name</th>
      <th>Image url</th>
      <th>Follower count</th>
      <th>Latest tweet</th>
      <th>Display</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($douches as $douche): ?>
    <tr>
      <td><a href="<?php echo url_for('douche/edit?id='.$douche->getId()) ?>"><?php echo $douche->getId() ?></a></td>
      <td><?php echo $douche->getSubmitIp() ?></td>
      <td><?php echo $douche->getTwitterId() ?></td>
      <td><?php echo $douche->getTwitterName() ?></td>
      <td><?php echo $douche->getImageUrl() ?></td>
      <td><?php echo $douche->getFollowerCount() ?></td>
      <td><?php echo $douche->getLatestTweet() ?></td>
      <td><?php echo $douche->getDisplay() ?></td>
      <td><?php echo $douche->getCreatedAt() ?></td>
      <td><?php echo $douche->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('douche/new') ?>">New</a>
