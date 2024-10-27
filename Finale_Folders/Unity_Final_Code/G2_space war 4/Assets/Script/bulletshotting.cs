using UnityEngine;

public class bulletshotting : MonoBehaviour
{
    public GameObject bulletPrefab; // Prefab for the bullet object
    public Transform bulletSpawnPoint; // Point from where the bullets will be spawned
    public float bulletSpeed = 10f; // Speed at which the bullets will move
    public GameObject aimTarget;
    public float shootCooldown = 0.000f; // Cooldown period between shots
    private float lastShootTime; // Timestamp of the last shot

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKey(KeyCode.Space) && Time.time >= lastShootTime + shootCooldown)
        {
            // Shoot a bullet in the direction the plane is facing
            Shoot();
            lastShootTime = Time.time; // Update the last shot timestamp
        }
    }

    void Shoot()
    {
        // Instantiate a new bullet object
        GameObject bullet = Instantiate(bulletPrefab, bulletSpawnPoint.position, bulletSpawnPoint.rotation);

        // Get the rigidbody component of the bullet
        Rigidbody bulletRigidbody = bullet.GetComponent<Rigidbody>();

        // Calculate the aim direction based on the aim target position
        Vector3 aimDirection = (aimTarget.transform.position - bullet.transform.position).normalized;

        // Set the rotation of the bullet to face the aim direction
        bullet.transform.rotation = Quaternion.LookRotation(aimDirection);

        // Add velocity to the bullet in the aim direction
        bulletRigidbody.velocity = aimDirection * bulletSpeed;

        // Destroy the bullet after a certain time (optional)
        Destroy(bullet, 3f);
    }
}
