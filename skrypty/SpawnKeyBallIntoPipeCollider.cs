// spawn klucza po wpadnieciu kulki do rury
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SpawnKeyBallIntoPipeCollider : MonoBehaviour
{
    private bool isSpawned = false;
    public GameObject cube;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Switch") && !isSpawned)
        {
            cube.SetActive(false);
            isSpawned = true;
        }
    }
}
