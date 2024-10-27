using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EnemyAI : MonoBehaviour
{
    public Transform playerTransform;

    [Header("Audio")]
    public AudioSource walkAudioSource;
    public AudioSource attackAudioSource;
    public AudioClip walkClip, hitClip;

    [Header("EnemyAI")]
    public float espeed = 10f;
    public float hitdamage = 2f;
    public float range = 2f;
    public float attackRange = 1.5f; // Adjust the attack range as needed
    public float maxAudioDistance = 10f;

    [Header("Attack")]
    public float timeBetweenAttacks = 2f;
    public float attackTimer;

    // Animation
    public Animation anim;

    private enum EnemyState
    {
        Idle,
        Walk,
        Attack
    }

    private EnemyState currentState = EnemyState.Idle;

    private void Start()
    {
        anim = GetComponent<Animation>();

        // Set up audio sources
        walkAudioSource = gameObject.AddComponent<AudioSource>();
        walkAudioSource.clip = walkClip;
        walkAudioSource.loop = true;

        attackAudioSource = gameObject.AddComponent<AudioSource>();
        attackAudioSource.clip = hitClip;
        attackAudioSource.volume = 0.1f;
        
    }

    // Update is called once per frame
    void Update()
    {
        AI();
    }

    private void AI()
    {
        if (playerTransform != null)
        {
            Vector3 direction = playerTransform.position - transform.position;

            float distance = direction.magnitude;

            direction.Normalize();

            // Update audio volume based on distance
            UpdateAudioVolume(distance);

            if (distance > range)
            {
                // Start walking audio only if the volume is greater than zero
                if (walkAudioSource.volume > 0f && !walkAudioSource.isPlaying)
                {
                    walkAudioSource.Play();
                }

                transform.Translate(direction * espeed * Time.deltaTime);

                SetAnimationState(EnemyState.Walk);
            }
            else
            {
                // Stop walking audio when within range
                walkAudioSource.Stop();

                // Decrement the timer
                attackTimer -= Time.deltaTime;

                // Check if it's time to attack and player is within attack range
                if (attackTimer <= 0f && distance <= attackRange)
                {
                    
                    Attack();

                    // Reset the timer
                    attackTimer = timeBetweenAttacks;
                }
            }
        }
    }

    private void Attack()
    {
        attackAudioSource.Play();
        PlayerPropertise playerhealth = playerTransform.GetComponent<PlayerPropertise>();

        if (playerhealth != null)
        {
            SetAnimationState(EnemyState.Attack);
            playerhealth.takedamage(hitdamage);
        }
    }

    private void SetAnimationState(EnemyState newState)
    {
        if (newState != currentState)
        {
            currentState = newState;

            // Play the corresponding animation based on the state
            switch (currentState)
            {
                case EnemyState.Idle:
                    anim.Play("Idle");
                    break;
                case EnemyState.Walk:
                    anim.Play("Walk");
                    break;
                case EnemyState.Attack:
                    anim.Play("Attack2");
                    break;
            }
        }
    }

    private void UpdateAudioVolume(float distance)
    {
        float normalizedDistance = Mathf.Clamp01(distance / maxAudioDistance);

        // Adjust audio volume based on distance
        walkAudioSource.volume = 0.4f - normalizedDistance;

         // Adjust attack audio volume based on distance
        attackAudioSource.volume = 0.1f - normalizedDistance;
        

        // Check if walking audio is playing and adjust attack audio volume
        if (walkAudioSource.isPlaying)
        {
            attackAudioSource.volume = 0f;
        }
        // Check if attack audio is playing and adjust walking audio volume
        else if (attackAudioSource.isPlaying)
        {
            walkAudioSource.volume = 0f;
        }
    }
}
