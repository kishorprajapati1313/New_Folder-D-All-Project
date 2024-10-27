using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class EnemySpawn : MonoBehaviour
{
    [Header("Textmesh")]
    public TextMeshProUGUI LevelSta;
    public TextMeshProUGUI ScoreSta;

    [Header("EnemyStat")]
    public GameObject enemyPrefab;
    public int enemyCount;
    public int level = 1;
    public int enemyHealth = 100;
    public int score = 0; // Added variable for the player's score
    public string groundTag = "Ground"; // Specify the tag for ground objects

    private List<GameObject> activeEnemies = new List<GameObject>(); // List to keep track of active enemies

    private void Start()
    {
        SpawnEnemies(level);
    }

    private void SpawnEnemies(int levels)
    {
        // Set the number of enemies based on the level
        enemyCount = level * 1;
        enemyCount = levels * 2;

        for (int i = 0; i < enemyCount; i++)
        {
            // Calculate random spawn positions within a certain range
            float xPos = Random.Range(-10f, 10f);
            float zPos = Random.Range(-10f, 10f);

            Vector3 spawnPosition = new Vector3(xPos, 0f, zPos);

            // Check if the spawn position is on an object with the specified tag
            if (IsOnGround(spawnPosition))
            {
                // Instantiate enemies at valid positions
                GameObject enemy = Instantiate(enemyPrefab, spawnPosition, Quaternion.identity);

                // Set enemy properties directly
                EnemyProperties enemyProperties = enemy.GetComponent<EnemyProperties>();
                if (enemyProperties != null)
                {
                    enemyProperties.SetHealth(enemyHealth);
                    // Add any other properties you want to set
                }

                // Add the enemy to the list of active enemies
                activeEnemies.Add(enemy);
            }
            else
            {
                // Retry spawning if the position is not on the ground
                i--;
            }
        }
    }

    // Check if a position is on an object with the specified tag
    private bool IsOnGround(Vector3 position)
    {
        RaycastHit hit;
        if (Physics.Raycast(position + Vector3.up * 10f, Vector3.down, out hit, 100f))
        {
            // Check if the hit object has the specified tag
            if (hit.collider.CompareTag(groundTag))
            {
                return true;
            }
        }
        return false;
    }

    // Call this method when all enemies are defeated or when you want to progress to the next level
    private void LevelUp()
    {
        level++;
        SpawnEnemies(level);
    }

    private bool hasLeveledUp = false; // New variable to track whether a level up has occurred

    private void Update()
    {
        LevelSta.SetText("Level: " + level);
        ScoreSta.SetText("Score: " + score);

        int destroyYPosition = -20;

        // Iterate through the list of active enemies
        for (int i = activeEnemies.Count - 1; i >= 0; i--)
        {
            GameObject enemy = activeEnemies[i];

            if (enemy == null || enemy.transform.position.y < destroyYPosition)
            {
                if (enemy != null)
                {
                    // Teleport the enemy to a new position if it goes below destroyYPosition
                    enemy.transform.position = Vector3.up * 10f;
                }
                // Remove destroyed or out-of-bounds enemies from the list
                activeEnemies.RemoveAt(i);
                Destroy(enemy);
                
                // Increase score when an enemy is defeated
                score += 10; // You can adjust the score based on your game's logic
            }
        }

        // Check if all enemies are defeated to progress to the next level
        if (activeEnemies.Count == 0 && !hasLeveledUp)
        {
            Debug.Log("All enemies defeated. Leveling up!");
            LevelUp(); // This should trigger if all enemies are defeated.
            hasLeveledUp = true; // Set the flag to true to avoid continuous leveling up
        }
        else if (activeEnemies.Count > 0)
        {
            hasLeveledUp = false; // Reset the flag if there are remaining enemies
        }
    }
}
