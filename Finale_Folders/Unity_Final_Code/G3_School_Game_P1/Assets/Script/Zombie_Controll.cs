using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Zombie_Controll : MonoBehaviour
{
    public Transform PointA;
    public Transform PointB;
    public float Speed = 3f;
    public Transform spawnPoint; // Set the spawn point in the Inspector
    public string playerTag = "Player"; // Set the player's tag in the Inspector

    private Transform currentPoint;
    private bool isMovingToA = true;

    // Start is called before the first frame update
    void Start()
    {
        currentPoint = PointA;
    }

    // Update is called once per frame
    void Update()
    {
        transform.position = Vector3.MoveTowards(transform.position, currentPoint.position, Speed * Time.deltaTime);

        if (Vector3.Distance(transform.position, currentPoint.position) < 0.1f)
        {
            if (isMovingToA)
            {
                currentPoint = PointB;
            }
            else
            {
                currentPoint = PointA;
            }

            isMovingToA = !isMovingToA;
        }

        transform.LookAt(currentPoint);
    }

    void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag(playerTag))
        {
            // Check if the collider's tag matches the player's tag
            
            // Respawn the player at the spawn point
            RespawnPlayer(other.gameObject);
        }
    }

    void RespawnPlayer(GameObject player)
    {
        // Move the player's GameObject to the spawn point's position
        player.transform.position = spawnPoint.position;
    }
}
